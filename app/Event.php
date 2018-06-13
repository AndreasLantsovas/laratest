<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	$events = DB::table('events')->get();

	return 	$events;
}
