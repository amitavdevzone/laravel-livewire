<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/event/add', [EventController::class, 'add'])->name('event.add');
    Route::livewire('/event/view/{event}', 'event-view')->name('event.view');
});

Route::get('/register/{event:identifier}', [EventController::class, 'register'])->name('event.register');
