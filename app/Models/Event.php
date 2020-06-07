<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function registrations()
    {
        return $this->hasMany(Registration::class)
            ->orderByDesc('id');
    }
}
