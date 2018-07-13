<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;
use App\Country;
use App\Link;
use Carbon\Carbon;
use Illuminate\Support\Collection;


class EventController extends Controller
{
    
    //список стран в меню
    protected $menuCountries;
    
    public function __construct() {
        
        //меню по странам
        $menuCountries = Collection::make();
        $countries = Country::all();
            foreach ($countries as $country) {
                if ((count($country->events)) != 0) {

                    foreach ($country->events as $event ) {
                        if ($event->published === 1){
                            //$menuCountries->put($country->name);
                            $menuCountries->push($country->name);
                        };
                    }
                }
            }

        $this->menuCountries = $menuCountries->unique()->values()->all();
    }




/**
 * Показать все записи.
 */
    public function index(){

        $countries = Country::all();
    	$events = Event::published()->get();
        $menuCountries = $this->menuCountries;

    	return view('index', compact('events', 'menuCountries'));
		//dd($request);
    }

/**
 * Показать одну записи.
 */
    public function show(Event $event){

        // $x = $event->published()->get();
        // dd($x);

        //список стран в меню
        $menuCountries = $this->menuCountries;

        $links = Link::where('event_id', '=', $event->id)->get();

        //dd($event->id);
        


		return view('events.show', compact('event','menuCountries', 'links'));
		//dd($request);
    }

/**
 * test
 */
    public function CountryEvents(Country $country){

        //список стран в меню
        $menuCountries = $this->menuCountries;

        //dd($country);
        $events = Event::where('country_id', '=', $country->id)->published()->get();
        
        return view('index', compact('events', 'country','menuCountries'));

//
    }


    /**
 * test
 */
    public function test(){


        
        $links = Link::where('event_id', '=', 2)->get();
    
        foreach ($links as $link) {
            echo $link->description.'<br>' ;
            echo $link->link.'<br>'.'<br>' ;
        }

        dd($links);



    }

}


















