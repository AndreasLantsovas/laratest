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

        return redirect()->route('admin');
     }



}
