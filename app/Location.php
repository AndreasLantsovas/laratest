<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

	  protected $fillable = [
        'event_id', 'lat', 'lng', 'formatted_address'
    ];



    public function event (){

    	return $this->belongsTo('App\Event');

    }
}
