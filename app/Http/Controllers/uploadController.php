<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\photo;

class uploadController extends Controller
{
    public function loadPage(){
        return view('uploadView');
    }

    public function addNewPhoto(){ //VALIDASI KHUSUS YG USER
        $cats=Category::all();
    

        $id=Auth::user()->userId;
        $data=Store::where('userId',$id)->first();

            
        if($data){
            return view('newCloth')->with('cats',$cats);
        }else{
            return redirect('/store');
        }


    }

    public function postNewPhoto(Request $req){
        $user = Auth::user();
        $id=$user->id;

     
        

        if($req->image){
            $req->image->storeAs('image',$req->image->getClientOriginalName(),'normal');

            photo::create([
                'user_id'=>$id,
                'PhotoName'=>$req->name,
                'PhotoURL'=>'image/'.$req->image->getClientOriginalName(),
                'PhotoDescription'=>$req->description,
                'PhotoPrice'=>$req->price
            ]);
        }else{

        }
        
        return redirect('/');
    }


}
