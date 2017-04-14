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
Route::get('/enter-join', 'JoinController@index');
Route::get('/enter-social-join', 'JoinController@index');
Route::get('/user-join', 'JoinController@index');
Route::get('/user-social-join', 'JoinController@index');
Route::post('/join_check', 'JoinController@joinCheck');
Route::post('/join-in', 'JoinController@enterStore');
Route::post('/join-in-user', 'JoinController@userStore');
Route::get('/complete/{stat}', 'JoinController@complete');

Route::post('/upload', 'CropController@upload');
Route::post('/crop', 'CropController@crop');

Route::get('/test', 'JoinController@test');
Route::get('/audition', 'AuditionController@index');