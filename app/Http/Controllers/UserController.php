<?php

namespace App\Http\Controllers;

use App\photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
// use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UserController extends Controller
{
    //

    public function getProfile($id){
        $user = User::find($id);
        if($user == null){
            return Redirect()->back();
        }
        // dd($user);
        $post = photo::where('user_id', $user->id)->get();
        // dd($post);
        return view('user', ['user' => $user, 'photo' => $post]);
    }

    public function getLogin(){
        if(Auth::user() != null){
            return Redirect()->back();
        }
        return view('login');
    }

    public function getLogout(){
        Auth::logout();
        return Redirect()->back();
    }

    public function getRegister(){
        if(Auth::user() != null){
            return Redirect()->back();
        }
        return view('register');
    }

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
        $remember = false;
        if($req->remember != null){
            $remember = true;
        }
        // dd($req->remember);
        if( $remember == false&& Auth::attempt(['email'=>$email,'password'=>$password ])){

                $token = Auth::getRecallerName();
            return redirect('/');
        }
        else if(Auth::attempt(['email'=>$email,'password'=>$password ], $remember)){
            // dd($req->remember);
            return redirect('/');
        }
        return redirect('/login')->withErrors(['msg', 'Invalid email or password']);
    }


}
