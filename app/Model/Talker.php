<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Talker extends Model
{
    //
    public function events()
    {
        return $this->hasMany('App\Model\Event');
    }
}
