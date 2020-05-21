<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventAddForm extends Component
{
    public $eventName;
    public $contactName;
    public $contactEmail;
    public $allowedParticipants;

    public function submit()
    {
        $this->validate([
            'eventName' => ['required', 'min:3'],
            'contactName' => ['required', 'min:3'],
            'contactEmail' => ['required', 'email'],
            'allowedParticipants' => ['required', 'numeric'],
        ]);

        Event::create([
            'event_name' => $this->eventName,
            'contact_person' => $this->contactName,
            'contact_email' => $this->contactEmail,
            'allowed_participant' => $this->allowedParticipants,
        ]);

        return $this->redirectRoute('home');
    }

    public function render()
    {
        return view('livewire.event-add-form');
    }
}
