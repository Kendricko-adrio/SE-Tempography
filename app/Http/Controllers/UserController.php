<?php

namespace App\Http\Controllers;

use App\photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
