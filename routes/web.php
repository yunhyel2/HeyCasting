<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/join', 'JoinController@index');
Route::post('/join_check', 'JoinController@joinCheck');

Route::get('/singer/create', 'Joincontroller@create');
Route::get('/actor/create', 'Joincontroller@create');
Route::get('/player/create', 'Joincontroller@create');
Route::get('/dancer/create', 'Joincontroller@create');
Route::get('/host/create', 'Joincontroller@create');
Route::get('/model/create', 'Joincontroller@create');
Route::post('/join', 'JoinController@store');


