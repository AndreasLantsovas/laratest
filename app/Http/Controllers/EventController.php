<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;
use App\Country;
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
    public function test($id){

        $country = Country::find($id);

        $events = Event::where('country_id', '=', $id)->get();

        //объединение коллекции

       // $concatenated = $collection->concat(['Jane Doe'])->concat(['name' => 'Johnny Doe']);
        //$events = $events->concat(['Country'=>$country->name]);
        //dd($events);
        
        return view('index', compact('events', 'country'));

//
    }

}
