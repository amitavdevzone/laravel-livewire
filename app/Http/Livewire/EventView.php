<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventView extends Component
{
    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event-view');
    }
}
