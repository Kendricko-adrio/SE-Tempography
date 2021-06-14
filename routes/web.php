<?php

use Illuminate\Support\Facades\Route;


Route::get('/','homeController@loadHome');
Route::get('/details/{id}','detailController@loadDetails');
Route::get('/cart','CartController@getCart');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', 'UserController@registration');


Route::post('/addToCart','CartController@addToCart');
Route::post('updateCart','CartController@updateCart');
Route::post('/postLogin','UserController@postLogin');