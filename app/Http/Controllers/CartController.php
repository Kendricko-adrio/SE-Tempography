<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\photo;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $req){
        // if(!Auth::check()){//kalo lom login maka login dulu
        //     return redirect('/login');
        // }

        $datas=photo::where('id',$req->itemId)->first();

        $cart=session()->get('shoppingCart'); 
        
        $data=$datas;

        $cart[$req->itemId]=array(
            "PhotoName"=>$data->PhotoName,
            "PhotoURL"=>$data->PhotoURL,
            "PhotoDescription"=>$data->PhotoDescription,
            "PhotoPrice"=>$data->PhotoPrice
        );

        session()->put('shoppingCart',$cart);
        return redirect('/');
    }

    public function getCart(){
        $cart=session()->get('shoppingCart');
        return view('cart',['cartData'=>$cart]);
    }
}
