<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\photo;

class detailController extends Controller
{
    public function loadDetails($id){
        $detailPhoto=photo::where('id',$id)->get();
        return view('photoDetail')->with('detailPhoto',$detailPhoto);
    }

}
