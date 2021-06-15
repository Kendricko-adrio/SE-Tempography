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
            "PhotoPrice"=>$data->PhotoPrice,
            "Id"=>$data->id
        );

        session()->put('shoppingCart',$cart);
        return redirect('/');
    }

    public function getCart(){
        $cart=session()->get('shoppingCart');
        return view('cart',['cartData'=>$cart]);
    }



    public function updateCart(Request $req){
        $datas=photo::where('Id',$req->itemId)->get();

        foreach($datas as $temp){
            $data=$temp;
         }
        
        $cart=session()->get('shoppingCart');
        if (isset($_POST['delete'])) {
            unset($cart[$req->itemId]);
        }else{
            if($req->qty<=0){
                unset($cart[$req->itemId]);
    
            }else{
                $cart[$req->itemId]=array(
                "itemId"=>$data->id,
                "image"=>$data->image,
                "itemName"=>$data->itemName,
                "storeName"=>$data->storeName,
                "price"=>$data->price,
                "qty"=>$req->qty
                );
            }
        }

        session()->put('shoppingCart',$cart);
        return redirect()->back();
    }
}
