<?php

namespace App\Rules;

use App\Models\Registration;
use Illuminate\Contracts\Validation\Rule;

class AlreadyRegistered implements Rule
{
    private $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    public function passes($attribute, $value)
    {
        $count = Registration::query()
            ->where('event_id', $this->eventId)
            ->where('email', $value)
            ->count();

        return $count === 0;
    }

    public function message()
    {
        return 'You are already registered to this event.';
    }
}
