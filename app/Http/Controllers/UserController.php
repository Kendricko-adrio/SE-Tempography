<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

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

    public function postLogin(Request $req){
        $email = $req->email;
        $password = $req->password;
        
        if(Auth::attempt(['email'=>$email,'password'=>$password])){

                $token = Auth::getRecallerName();
            return redirect('/');
        }
        
        return redirect('/login')->withErrors(['msg', 'Invalid email or password']);
    }


}
