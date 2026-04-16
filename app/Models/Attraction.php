<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Pest\Support\Description;

class Attraction extends Model
{

     protected $fillable =[
            'destination_id',
            'name',
            'description',
     ];
     public function destination() {
        return $this->belongsTo(Destination::class);
}
}
