<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\photo;

class homeController extends Controller
{
    public function loadHome()
    {
        $data=photo::all();
        return view('home')->with('photo',$data);
    }
}
