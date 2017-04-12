<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enter;
use App\Enter_profile;
use App\Enter_main_image;

class HomeController extends Controller
{
    public function index()
    {
        $new_enters = Enter::orderBy('created_at', 'desc')->limit(8);
        $best_enters = Enter_profile::orderBy('count', 'desc')->limit(7);
        $new_images = array();
        $best_images = array(); 

        foreach( $new_enters as $new_enter ) {
            $main_image = $new_enter->main_image()->first()->image;
            array_push( $new_images, $main_image ); 
        }

        foreach( $best_enters as $best_enter ) {
            $enter_id = $best_enter->enter()->first()->id;
            $image = Enter_main_image::where('enter_id', $enter_id)->first()->image;
            array_push( $best_images, $image );
        }

        return view('home')->with('new_enters', $new_images)->with('best_enters', $best_images);
    }
}
