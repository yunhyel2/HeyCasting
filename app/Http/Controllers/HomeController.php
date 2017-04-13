<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enter;
use App\Enter_profile;
use App\Exhibition;

class HomeController extends Controller
{
    public function index()
    {

        $new_enters = Enter::orderBy('created_at', 'asc')->limit(8)->get();
        $best_enters = Enter_profile::orderBy('count', 'desc')->limit(7)->get();
        $banners = Exhibition::where('flag', 'B')->get();

        return view('home')->with('new_enters', $new_enters)->with('best_enters', $best_enters)->with('banners', $banners);
        //$best_enter->enter->jobs->first()
        //$best_enter->enter->jobs->job()->job //직업
        //$best_enter->name //이름 
        //$best_enter->enter()->first()->main_image()->first()->image //이미지

        //$new_enter->profile->name //이름 
        //$new_enter->profile->intro //소개
        //$new_enter->main_image->image //이미지
    }
}
