<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enter_job extends Model
{
    protected $table = 'User_enter_job2';

    public function enter()
    {
        return $this->belongsTo('App\Enter');
    }

    public function job()
    {
        return $this->belongsToMany('App\Job');
    }
}
