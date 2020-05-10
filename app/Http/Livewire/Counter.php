<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count;
    public $message;

    public function mount()
    {
        $this->count = 0;
    }

    public function updated($name, $value)
    {
        logger($name);
        logger($value);
    }

    public function increment()
    {
        $this->count = $this->count + 1;
    }

    public function decrement()
    {
        if ($this->count < 1) {
            return;
        }
        $this->count--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
