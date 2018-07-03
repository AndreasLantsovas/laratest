<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{	
	//убирает поля update time и create time
	//public $timestamps = false;

	public function getRouteKeyName(){
		return 'alias';
	}

	public function scopePublished($query){

		$query->where('published', 1)->orderBy('start_date', 'desc')->get();
        
    }

    public function country (){

    	return $this->belongsTo('App\Country');

    }

}
