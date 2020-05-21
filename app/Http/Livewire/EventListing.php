<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventListing extends Component
{
    public $events;

    public function mount()
    {
        $this->events = Event::query()
            ->orderByDesc('id')
            ->get();
    }

    public function render()
    {
        return view('livewire.event-listing');
    }
}
