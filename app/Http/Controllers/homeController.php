<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\photo;

class homeController extends Controller
{
    public function loadHome()
    {
        $user = Auth::user();

        if($user!=null){
            $data=photo::where('user_id','!=',$user->id)->get();
        }else{
            $data=photo::all();
        }
        
        return view('home')->with('photo',$data);
    }
}
