<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{	
	//убирает поля update time и create time
	//public $timestamps = false;

//* Accssesers

	// public function getStartDateAttribute($value){
 //        return date ('j F Y',  strtotime($value));
 //    }


	public function getRouteKeyName(){
		return 'alias';
	}


	public function scopePublished($query){

		$query->where('published', 1)->orderBy('start_date', 'asc')->get();
        
    }


    public function country (){

    	return $this->belongsTo('App\Country');

    }


}
