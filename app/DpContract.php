<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DpContract extends Model
{
    public $timestamps = false;
    protected $hidden = [
        'pivot',
    ];

    public function usages()
    {
        return $this->belongsToMany('App\Usage', 'dp_contract_usage');
    }
}
