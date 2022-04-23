<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileComponent extends Component
{
    public $data;
    public $type;
    public $user_id;
    public $user;
    public $password;

    public function mount($type)
    {
        $this->type       = $type;
        $this->user_id    = Auth::id();
        $this->data       = User::find($this->user_id)->toArray();
    }

    public function render()
    {
        return view('livewire.profile-component');
    }

    public function store()
    {
        $user = User::find($this->user_id);
        $user->fill($this->data);
        $user->update();
        $this->emit('updatePerfil', true);
    }

    public function setPassword()
    {
        $user             = User::find($this->user_id);
        $user->password   = bcrypt($this->password);
        $user->update();
        $this->emit('updatePassword', true);
    }
}
