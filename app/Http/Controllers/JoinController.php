<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinController extends Controller
{

    public function index()
    {
        return view('Join.index');
    }

}
