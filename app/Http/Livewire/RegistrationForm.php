<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class RegistrationForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirmPassword;

    public function onSubmit()
    {
        $this->validate([
            'name' => ['required', 'min::3'],
            'email' => ['unique:users,email', "email"],
            'password' => ['required', 'min:6'],
            'confirmPassword' => ['required', 'same:password'],
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => \bcrypt($this->password),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.registration-form');
    }
}
