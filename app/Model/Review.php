<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public function review_options()
    {
        return $this->belongsToMany('App\Model\ReviewOption')->withPivot('score_id')->withTimestamps();
    }

    public function talk()
    {
        return $this->belongsTo('App\Model\Talk');
    }
}
