<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserFollow extends Component
{
    public int $userId;

    public bool $following = false;

    //Permite que o usuário siga outro usuário uma vez
    public function mount()
    {
        $this->following = Auth::user()->following->contains($this->userId);
    }

    public function render()
    {
        return view('livewire.user-follow');
    }

    //Função Seguir que envia para o BD
    public function follow()
    {
        if ($this->following) {
            Auth::user()->following()->detach($this->userId);
        } else {
            Auth::user()->following()->attach($this->userId);
        }

        $this->following = !$this->following;
    }
}
