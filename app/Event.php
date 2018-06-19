<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{	
	//убирает поля update time и create time
	//public $timestamps = false;

	public function getRouteKeyName(){
		return 'alias';
	}
}
