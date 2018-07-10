<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;
use App\Country;
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

        //список стран в меню
        $menuCountries = $this->menuCountries;

		return view('events.show', compact('event','menuCountries'));
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



        //меню по странам
        $menuCountries = Collection::make();
        $countries = Country::with('events')->get();
//dd($countries);
        //dd($country->name);
            foreach ($countries as $country) {
                

                    foreach ($country->events as $event ) {

                        //print_r($country);
                        if ($event->published === 1){
                            //$menuCountries->put($country->name);
                            $menuCountries->push($country->name , $country->id);
                        };
                    }
                
            }

 //       $this->menuCountries = $menuCountries;


            $unique_data = $menuCountries->unique()->values()->all();
 dd($unique_data);



    }

}


















