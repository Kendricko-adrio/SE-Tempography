@extends('master')

@section('head')
<title>Home</title>
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@stop

@section('content')
    <div class="jumbotron text-light text-center ">
        <div class="container row">
            <div class="col-8 column">
                <div class="detail">
                    <h1>Buy and Sell Photos Online</h1>
                    <div>Easy to use and user friendly platform to buy and sell your photography arts</div>
                </div>
            </div>
            <div class="col-4 column">
                <img class="logo" src="{{asset('image/logo.png')}}">
            </div>
        </div>
    </div>
    <div class="container">

    </div>
@stop
