<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{



	   protected $fillable = [
        'event_id', 'link', 'description'
    ];



    //A links can has many events
    public function event (){

    	return $this->hasMany('App\Event');

    }
}
