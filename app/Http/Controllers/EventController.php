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
                  $menuCountries->put($country->name , $country->id);
              }
        }

        $this->menuCountries = $menuCountries;
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
    public function CountryEvents($id){

        $menuCountries = $this->menuCountries;
        $country = Country::find($id);
        $events = Event::where('country_id', '=', $id)->published()->get();
        
        return view('index', compact('events', 'country','menuCountries'));

//
    }


    /**
 * test
 */
    public function test(){

    //меню по странам
        $menuCountries = Collection::make();
        $countries = Country::all();

         foreach ($countries as $country) {
              if ((count($country->events)) != 0) {
                 $menuCountries->put($country->name , $country->id);
             }
         }

     //  dd($collection);
        
        return view('index2', compact( 'menuCountries'));

//
    }

}







