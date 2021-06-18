<?php

use Illuminate\Support\Facades\Route;


Route::get('/','homeController@loadHome');
Route::get('/details/{id}','detailController@loadDetails');
Route::get('/cart','CartController@getCart');
Route::post('/checkout', 'CartController@postCart');
Route::get('/login','UserController@getLogin');
Route::get('/register', 'UserController@getRegister');
Route::get('/myhistory', 'TransactionController@getHistoryPage');
Route::post('/myhistory/{id}', 'TransactionController@postDownload');
Route::post('/register', 'UserController@registration');
Route::get('/user/{id}', 'UserController@getProfile');
Route::get('/upload','uploadController@loadPage');
Route::post('/search', 'PhotoController@getSearchPhoto');

Route::post('/addToCart','CartController@addToCart');
Route::post('updateCart','CartController@updateCart');
Route::post('/postLogin','UserController@postLogin');
Route::post('/postNewPhoto','uploadController@postNewPhoto');
Route::get('/logout', 'UserController@getLogout');
