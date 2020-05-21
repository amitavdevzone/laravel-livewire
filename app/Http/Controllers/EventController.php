<?php

namespace App\Http\Controllers;

class EventController extends Controller
{
    public function add()
    {
        return view('pages.event-add-page');
    }
}
