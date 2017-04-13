<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enter;
use App\Enter_profile;
use App\Enter_main_image;
use App\Exhibition;

class HomeController extends Controller
{
    public function index()
    {
        $new_enters = Enter::orderBy('created_at', 'desc')->limit(8);
        $best_enters = Enter_profile::orderBy('count', 'desc')->limit(7);
        $banners = Exhibition::where('flag', 'B')->get();

        return view('home')->with('new_enters', $new_enters)->with('best_enters', $best_enters)->with('banners', $banners);
        //$best_enter->enter()->first()->jobs()->first()->job //직업
        //$best_enter->name //이름 
        //$best_enter->enter()->first()->main_image()->first()->image //이미지

        //$new_enter->profile()->first()->name //이름 
        //$new_enter->profile()->first()->intro //소개
        //$new_enter->main_image()->first()->image //이미지
    }
}
