<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

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
        
        return redirect('admin')->with('success', 'Information has been added');

     }

/**
 * форма для добавления запись.
 */
    public function create()
     {
        return view('create');
     }

/**
 * форма для добавления запись.
 */
    public function edit($id)
     {
        //echo "EDIT";
        $events = Event::find($id);
        return view('edit',compact('events','id'));
     }
}




