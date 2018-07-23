<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function event (){

    	return $this->belongsTo('App\Event');

    }
}
