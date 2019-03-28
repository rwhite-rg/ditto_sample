<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    public $timestamps = false;
    protected $hidden = [
        'pivot',
    ];

    public function musicContracts()
    {
        return $this->belongsToMany('App\MusicContract', 'music_contract_usage');
    }

    public function dpContracts()
    {
        return $this->belongsToMany('App\DpContract', 'dp_contract_usage');
    }

}
