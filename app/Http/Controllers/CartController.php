<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\photo;
use App\TransactionDetail;
use App\TransactionHeader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function postCart(Request $request){
        $cart = session()->get('shoppingCart');
        // dd($cart);
        if($cart == 0){
            return Redirect()->back()->withErrors(['error' => 'No Cart Found']);
        }
        $user = Auth::user();
        // $header = TransactionHeader::create([
        //     'user_id' => $user->id,
        //     'transaction_status_id' => '2'
        // ]);
        $header = new TransactionHeader;
        $header->user_id = $user->id;
        $header->transaction_status_id = '2';
        $header->save();
        // dd($header->id);
        foreach($cart as $index => $value){
            TransactionDetail::create([
                'transaction_id' => $header->id,
                'photo_id' => $index
            ]);
        }
        $request->session()->forget('shoppingCart');
        // return view('home', ['success' => 'Thanks for purchasing!']);
        return redirect('/')->with(['success' => 'Thanks for purchasing!']);
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
