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
Route::get('/join', 'JoinController@index');
Route::post('/join_check', 'JoinController@joinCheck');
Route::post('/join-in', 'JoinController@store');

// Route::get('/singer/create', 'Joincontroller@create');
// Route::get('/actor/create', 'Joincontroller@create');
// Route::get('/player/create', 'Joincontroller@create');
// Route::get('/dancer/create', 'Joincontroller@create');
// Route::get('/host/create', 'Joincontroller@create');
// Route::get('/model/create', 'Joincontroller@create');

Route::get('/join/naver', 'SocialController@redirectToNaver');
Route::get('/join_naver', 'SocialController@callbackNaver');
Route::get('/join/kakao', 'SocialController@redirectToKakao');
Route::get('/join_kakao', 'SocialController@callbackKakao');
Route::get('/join/facebook', 'SocialController@redirectToFacebook');
Route::get('/join_facebook', 'SocialController@callbackFacebook');
Route::get('/join/google', 'SocialController@redirectToGoogle');
Route::get('/join_google', 'SocialController@callbackGoogle');

