<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //A country can has many events
    public function events (){

    	return $this->hasMany('App\Event');

    }

	public function getRouteKeyName(){
		return 'name';
	}


}
