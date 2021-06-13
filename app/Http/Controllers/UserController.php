<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //

    public function registration(Request $request){
        // dd($request);
        request()->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back();
    }
}
