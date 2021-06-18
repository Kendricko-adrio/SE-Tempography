<?php

namespace App\Http\Controllers;

use App\photo;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    //
    public function getHistoryPage(){
        // return view('history');
        $user = Auth::user();
        if($user == null){
            return redirect()->back();
        }
        $transaction = DB::table('transaction_headers')
        ->join('transaction_details', 'transaction_headers.id', '=', 'transaction_details.transaction_id')
        ->join('photos', 'photos.id', '=', 'transaction_details.photo_id')
        ->where('transaction_headers.transaction_status_id', '=', '2')
        ->where('transaction_headers.user_id', '=', $user->id)
        ->select('photos.PhotoName', 'transaction_headers.created_at', 'photos.PhotoURL', 'transaction_details.photo_id')
        ->orderBy('transaction_headers.created_at', 'desc')
        ->get();
        // dd($transaction);
        return view('history', ['transaction' => $transaction]);
    }

    public function postDownload(Request $request){
        // dd("sukses");
        $photoId = $request->id;
        // dd($request->id);
        $photo = photo::find($photoId);
        // dd($transaction);
        $url = public_path() .'/' .$photo->PhotoURL;
        // dd(asset('image/photo1.jpg'));
        return response()->download($url);
    }
}
