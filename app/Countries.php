<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
	//убирает поля update time и create time
	public $timestamps = false;

	public function events(){

		return $this->hasMany('App\Event');
	}

}
