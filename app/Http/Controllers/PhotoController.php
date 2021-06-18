<?php

namespace App\Http\Controllers;

use App\photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    //
    public function getSearchPhoto(Request $request){
        $name = $request->name;

        $search = '%'.$name.'%';

        $photos = DB::table('photos')
        ->where('photos.PhotoName', 'LIKE', $search)
        ->get();

        // dd($photos);
        return view('search', ['photo' => $photos]);
    }
}
