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

/*
Route::get('/user', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::get('/user/create', 'UserController@create');
Route::get('/user/{id}/edit', 'UserController@edit');
Route::post('/user', 'UserController@store');
Route::put('/user/{id}', 'UserController@update');
Route::patch('/user/{id}', 'UserController@update');
Route::delete('/user', 'UserController@destroy');
*/

