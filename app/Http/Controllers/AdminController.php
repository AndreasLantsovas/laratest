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
        $EventUpdate->alias = strtolower (str_replace(' ', '-', $request->input('name')));
        $EventUpdate->save();
         //echo $rows['name'];

        //$url = $request->input('start_date');
        // $url2 = $request->url();

        //echo ($url);
        return redirect('admin')->with('success', 'Information has been edited');

        
    //    return redirect('admin')->with('success', 'Information has been added');
     }





}




