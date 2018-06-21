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
Route::get('/', 'EventController@index');
//Route::get('/', 'EventController@index') -> name('index');

Route::get('event/{event}', 'EventController@show');

//admin


 


Auth::routes();


Route::get('admin', 'AdminController@index')->name('admin')->middleware('auth');

Route::get('admin/{event}/delete', 'AdminController@destroy')->middleware('auth');

Route::get('admin/create', 'AdminController@create')->name('create');
Route::post('admin/create', 'AdminController@store')->name('store');

Route::get('admin/{event}/edit', 'AdminController@edit');
Route::post('admin/update', 'AdminController@update')->name('update');

Route::get('admin/pablished', 'AdminController@ShowPublished');

//destroy($id)