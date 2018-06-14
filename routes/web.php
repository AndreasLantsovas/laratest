<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$events = DB::table('events')->get();

    return view('index', compact('events'));
});

Route::get('event/{id}', function ($id) {
	$event = DB::table('events')->find($id);
	return view('events.show', compact('event'));
}); 