<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public function talkers()
    {
        return $this->belongsTo('App\Model\Talker');
    }

    public function reviews()
    {
        return $this->hasMany('App\Model\Review');
    }
}
