<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Rules\AlreadyRegistered;
use Livewire\Component;

class EventRegister extends Component
{
    public $event;
    public $email;
    public $name;

    public function submit()
    {
        $this->validate([
            'email' => ['required', new AlreadyRegistered($this->event->id)],
            'name' => ['required'],
        ]);

        $event = Event::find($this->event->id);

        $event->registrations()->create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $event->increment('registered_participant');

        $this->redirectRoute('event.register', ['event' => $this->event->identifier]);
    }

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event-register');
    }
}
