<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\User;

class Appointment extends Model
{
    protected $fillable = [
        //might have to add "id", "created_at", "updated_at", to beginning of table???
         "client_id", "counsellor_id", "date", "time", "notes",
    ];

    public function client() 
    {
        return $this->belongsTo('App\User', 'client_id');
    }

    public function counsellor()
    {
        return $this->belongsTo('App\User', 'counsellor_id');
    }
}
