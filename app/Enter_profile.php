<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enter_profile extends Model
{
    protected $table = 'User_enter_profile';

    public function enter() 
    {
        return $this->belongsTo('App\Enter');
    }
}
