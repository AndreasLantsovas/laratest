<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;
use Carbon\Carbon;

class EventController extends Controller
{

/**
 * Показать все записи.
 */
    public function index(){
		//$events = DB::table('events')->get();
// 		$events = Event::all();
// dd($events);;
    //все опубликованные записи с сортировой по дате начала
    	$events = Event::published()->get();
        //dd($events);
    	return view('index', compact('events'));
		//dd($request);
    }

/**
 * Показать одну записи.
 */
    public function show(Event $event){

		return view('events.show', compact('event'));
		//dd($request);
    }

/**
 * test
 */
    public function test(){

$now = new Carbon();

$fd = $now->format('j F')." - ".$now->format('j F');

        return view('test', compact('fd'));
        //dd($request);
    }

}
