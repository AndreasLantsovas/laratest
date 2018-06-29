<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Countries;

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
        return view('admin', compact('events'));
        //dd($request);
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
        return view('create', compact('events'));
     }

/**
 * форма для редактирования запись.
 */
    public function edit($id)
     {
        //echo "EDIT";
        $events = Event::find($id);
        return view('edit',compact('events'));
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
        $EventUpdate->alias = strtolower (str_replace(' ', '-', $request->input('name')));
        
        if ($EventUpdate->published === null) {
            $EventUpdate->published = 0;
        }
        else {
            $EventUpdate->published = 1;
        }

        $EventUpdate->save();       

     //   dd($EventUpdate);

        return redirect('admin')->with('success', 'Information has been edited');

        
    //    return redirect('admin')->with('success', 'Information has been added');
     }





}




