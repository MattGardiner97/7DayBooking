<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Appointment extends Model
{
    public function client() 
    {
        $this->belongsTo('App\User', 'client_id');
    }

    public function psychologist()
    {
        $this->belongsTo('App\User', 'psychologist_id');
    }
}
