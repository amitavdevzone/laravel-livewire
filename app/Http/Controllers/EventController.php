<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function add()
    {
        return view('pages.event-add-page');
    }

    public function register(Event $event)
    {
        $event->load(['downloads']);

        return view('pages.event-register', [
            'event' => $event,
        ]);
    }
}
