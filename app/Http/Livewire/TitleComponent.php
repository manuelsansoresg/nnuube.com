<?php

namespace App\Http\Livewire;

use App\Models\TitleUser;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use Livewire\WithFileUploads;

class TitleComponent extends Component
{
    use WithFileUploads;
    public $title_id;
    public $title;
    public $data;
    public $file;

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

        if ($this->title != '') {
            $this->title->fill($this->data);
            $this->title->update();
        }

    }
}
