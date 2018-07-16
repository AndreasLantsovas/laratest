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
Route::get('/', 'EventController@index')-> name('index');
//Route::get('/', 'EventController@index') -> name('index');

Route::get('event/{event}', 'EventController@show')->middleware('published');

Route::get('country/{country}', 'EventController@CountryEvents')->name('country');

Route::get('test/', 'EventController@test');



//admin

Auth::routes();


Route::get('admin', 'AdminController@index')->name('admin')->middleware('auth');

Route::get('admin/{event}/delete', 'AdminController@destroy')->middleware('auth');

Route::get('admin/create', 'AdminController@create')->name('create');
Route::post('admin/create', 'AdminController@store')->name('store');
Route::post('admin/update', 'AdminController@update')->name('update');


Route::get('admin/countries', 'AdminController@countries')->name('countries');

Route::get('admin/published', 'AdminController@ShowPublished');

Route::get('admin/{event}', 'AdminController@Show')->name('show');
Route::get('admin/{event}/edit', 'AdminController@edit');

//working with inks in post

Route::get('admin/{event}/link/', 'AdminController@test')->name('links');

Route::post('admin/{event}/link/store', 'AdminController@link_store')->name('linkstore');

Route::get('admin/{event}/link/delete/{id}', 'AdminController@link_delete')->name('link_delete');

