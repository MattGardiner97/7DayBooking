<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\User;

class Appointment extends Model
{
    protected $fillable = [
        //might have to add "id", "created_at", "updated_at", to beginning of table???
         "client_id", "psychologist_id", "date", "time", "notes",
    ];

    public function client() 
    {
        return $this->belongsTo('App\User', 'client_id');
    }

    public function psychologist()
    {
        return $this->belongsTo('App\User', 'psychologist_id');
    }
}
