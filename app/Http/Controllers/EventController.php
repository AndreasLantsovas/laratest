<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;

class EventController extends Controller
{

/**
 * Показать все записи.
 */
    public function index(){
		//$events = DB::table('events')->get();
		$events = Event::all();
    	return view('index', compact('events'));
		//dd($request);
    }

/**
 * Показать одну записи.
 */
    public function show(Event $event){
		//$event = Event::find($id);

		return view('events.show', compact('event'));
		//dd($request);
    }

}
