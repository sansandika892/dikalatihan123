<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extenDs Model
{
    protected $fillable =[
        'name',
        'description',
        'location',
        'working_days',
        'working_hours',
        'ticket_price',

    ];
    public function attractions() {
        return $this->hasMany(Attraction::class);
    }
}
