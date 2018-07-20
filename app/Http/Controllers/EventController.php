<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;
use App\Country;
use App\Link;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Mapper;


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
   
 Mapper::map(41.5830591, 28.1409683, ['zoom' => 11, 'markers' => ['title' => 'My Location', 'animation' => 'DROP']]);

 

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


         //Mapper::map(41.5830591, 28.1409683);

        Mapper::map(41.5830591, 28.1409683, ['zoom' => 11, 'markers' => ['title' => 'My Location', 'animation' => 'DROP']]);

// Map
// Mapper::map(53.3, -1.4, ['zoom' => 10, 'center' => false, 'markers' => ['title' => 'My Locationh', 'animation' => 'DROP']]);
// // Information window
// Mapper::informationWindow(53.4, -1.5, 'Content1');
// Mapper::informationWindow(52.4, -1.0, 'Content2');
// Mapper::informationWindow(51.4, -0.5, 'Content3');
//Mapper::marker(53.381128999999990000, -1.470085000000040000);

        // Mapper::map(53.381128999999990000, -1.470085000000040000);

       //  Mapper::marker(41.5830591, 28.1409683);


    return view('map');



    }

}


















