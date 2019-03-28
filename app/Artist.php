<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $timestamps = false;

    public function musicContracts()
    {
        return $this->hasMany('App\MusicContract');
    }
}
