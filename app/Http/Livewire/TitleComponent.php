<?php

namespace App\Http\Livewire;

use App\Lib\LMercadoPago;
use App\Models\TitleUser;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class TitleComponent extends Component
{
    use WithFileUploads;
    public $title_id;
    public $title;
    public $data;
    public $file;
    public $btnMercadoPago;
    public $tokenMercadoPago;

    public function mount($title_id = null)
    {
        $this->title                    = '';
        $this->data['titulo']           = '';
        $this->data['palabras_clave']   = '';
        $this->data['descripcion']      = '';
        $this->data['imagen']           = '';
        
        $this->data['sitio']            = '';
        $this->data['facebook']         = '';
        $this->data['twitter']          = '';
        $this->data['instagram']        = '';

        if ($title_id != null) {
            $this->title_id =  $title_id;
            $this->title = TitleUser::find($title_id);
            $this->data =  $this->title->toArray();
        } else {
            $mercado_pago           = new LMercadoPago();
            $get_mercado_pago       = $mercado_pago->createButton();
            $this->btnMercadoPago   = $get_mercado_pago['url'];
            $this->tokenMercadoPago = $get_mercado_pago['token'];
        }
    }

    public function render()
    {
        return view('livewire.title-component');
    }

    public function store()
    {
        Artisan::call('storage:link');
        
        
        if ($this->file != null) {
            $imagen_anterior = $this->data['imagen'];
            @unlink('storage/'.$imagen_anterior);
            $file = $this->file->store('files', 'public');
            $this->data['imagen'] = $file;
        }
        
        $this->data['slug'] = Str::slug($this->data['titulo']);

        if ($this->title != '') {
            $this->title->fill($this->data);
            $this->title->update();
        } else {
            $this->data['user_id'] = Auth::user()->id;
            $this->data['token'] = $this->tokenMercadoPago;
            $title = new TitleUser($this->data);
            $title->save();
            return redirect($this->btnMercadoPago);
        }

    }
}
