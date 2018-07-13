<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //A links can has many events
    public function event (){

    	return $this->hasMany('App\Event');

    }
}
