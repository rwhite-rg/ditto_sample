<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicContract extends Model
{
    public $timestamps = false;
    protected $hidden = [
        'id',
        'pivot',
        'artist_id',
    ];

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function usages()
    {
        return $this->belongsToMany('App\Usage', 'music_contract_usage');
    }
}
