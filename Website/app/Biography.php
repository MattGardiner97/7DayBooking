<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    protected $table = "biography";
    protected $fillable = [
        "psychologist_id", "details", "keywords"
    ];

    public function psychologist()
    {
        return $this->belongsTo('App\User', 'psychologist_id');
    }
}