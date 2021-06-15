<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\photo;
use App\User;

class detailController extends Controller
{
    public function loadDetails($id){
        $detailPhoto=photo::find($id);
        // $user = User::find($detail);
        return view('photoDetail')->with('detailPhoto',$detailPhoto);
    }

}
