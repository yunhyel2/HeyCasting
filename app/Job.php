<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'Job2';

    // public function enters()
    // {
    //     return $this->belongsToMany('App\Enter_job');
    // }

    public function enters()
    {
        return $this->belongsToMany('App\Enter', 'User_enter_job2');
    }
}
