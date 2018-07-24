<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;
use App\Country;
use App\Link;
use App\Location;
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

       // $countries = Country::all();
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

        $links = $event->link;


        //$location = Location::where('event_id', '=', $event->id)->get();


        if (!$event->location) {
               $map ='have not location';
        }

        else{
        
            
            $map = Mapper::map($event->location->lat, $event->location->lng, ['zoom' => 12, 'markers' => ['title' => 'My Location', 'animation' => 'DROP']])->render();
        }

       //dd($event->link);

        
        return view('events.show', compact('event','menuCountries', 'links', 'map'));

    }






/**
 * Показывать все мероприятия для конкретной страны
 */
    public function CountryEvents(Country $country){

        //список стран в меню
        $menuCountries = $this->menuCountries;

        //dd($country);
        $events = Event::where('country_id', '=', $country->id)->published()->get();
        
        return view('index', compact('events', 'country','menuCountries'));
    }


    /**
 * test
 */
    public function test(){


         //Mapper::map(41.5830591, 28.1409683);

        Mapper::map(41.5830591, 28.1409683, ['zoom' => 11, 'markers' => ['title' => 'My Location', 'animation' => 'DROP']]);


    return view('map');



    }

}


















