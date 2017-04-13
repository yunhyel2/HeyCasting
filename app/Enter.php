<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enter extends Model
{
    protected $table = 'User_enter';

    public function profile() 
    {
        return $this->hasOne('App\Enter_profile');
    }
    
    public function main_image() 
    {
        return $this->hasOne('App\Enter_main_image');
    }
    
    public function jobs() 
    {
        return $this->hasMany('App\Enter_job');
    }
}
