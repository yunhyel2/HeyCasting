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
Route::get('/singer', 'Joincontroller@create');
Route::get('/actor', 'Joincontroller@create');
Route::get('/musician', 'Joincontroller@create');
Route::get('/dancer', 'Joincontroller@create');
Route::get('/mc', 'Joincontroller@create');
Route::get('/model', 'Joincontroller@create');


