<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Country;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


/**
 * Показать все записи.
 */
    public function index(){
        //$events = DB::table('events')->get();
        $events = Event::all();
 //   dd($events);
        return view('admin', compact('events'));

    }


    public function ShowPublished(){
        $events = Event::published()->get();
        return view('admin', compact('events'));

    }

/**
 * Удалить запись.
 */
     public function destroy($id){
        $event = Event::findOrFail($id);
        $event->delete($id);
        return redirect()->route('admin')->with('success', 'Information has been deleted');
     }

/**
 * Добавить запись.
 */

    public function store(Request $request)
    {
        $event = new Event;

        $event->name = $request->name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->start_date;
        $event->details = $request->details;
        $event->alias = strtolower (str_replace(' ', '-', $request->name));
        $event->country_id = $request->country_id;

       // dd($event);

        $event->save();

        // $country = new Countries;
        // $country->name = $request->country;
        // $country->save();
        
        return redirect('admin')->with('success', 'Information has been added');

     }

/**
 * форма для добавления запись.
 */
    public function create()
     {
        $events = new Event;
        $events->published = 0;

        $countries = Country::all();

//---------------------
//                dd($countries);
//---------------------

        return view('create', compact('events', 'countries'));
     }

/**
 * форма для редактирования запись.
 */
    public function edit($id)
     {

        $countries = Country::all();
        $events = Event::find($id);

 //       dd($events);
        return view('edit',compact('events', 'countries'));

     }

    public function update(Request $request)
     {
        //echo $request['id'];

        $EventUpdate = Event::find($request['id']);

        $EventUpdate->name = $request->input('name');
        $EventUpdate->details = $request->input('details');
        $EventUpdate->start_date = $request->input('start_date');
        $EventUpdate->end_date = $request->input('start_date');
        $EventUpdate->published = $request->input('published');
        $EventUpdate->country_id = $request->input('country_id');
        $EventUpdate->alias = strtolower (str_replace(' ', '-', $request->input('name')));
        
        if ($EventUpdate->published === null) {
            $EventUpdate->published = 0;
        }
        else {
            $EventUpdate->published = 1;
        }

        $EventUpdate->save();       
//$event = $EventUpdate;
      //  dd($request);
//return view('admin.show',compact('event'))->with('success', 'Information has been edited');
        return redirect('admin')->with('success', 'Information has been edited');
    }


/**
 * Показать одну записи в админке.
 */
    public function show($id){
        $event = Event::find($id);
        return view('admin.show', compact('event'));
        //dd($request);
    }


}




