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

//Route::get('admin/', 'Admin\AccountController@index')-> name('admin');


Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin', 'AdminController@index');