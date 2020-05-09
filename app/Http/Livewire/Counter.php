<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Counter extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $guest = User::find(2);

        return view('livewire.counter', [
            'guest' => $guest,
        ]);
    }
}
