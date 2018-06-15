<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index(){
    	echo "Admin";
		//$events = DB::table('events')->get();
		//$events = Event::all();
    	//return view('index', compact('events'));
		//dd($request);
    }
}
