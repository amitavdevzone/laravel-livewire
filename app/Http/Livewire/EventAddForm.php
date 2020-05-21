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
        Event::create([
            'event_name' => $this->eventName,
            'contact_person' => $this->contactName,
            'content_email' => $this->contactEmail,
            'allowed_participant' => $this->allowedParticipants,
        ]);

        return $this->redirectRoute('home');
    }

    public function render()
    {
        return view('livewire.event-add-form');
    }
}
