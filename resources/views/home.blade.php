
@extends('master')

@section('head')
<title>Home</title>
<link rel="stylesheet" href="{{asset('css/home.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
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

          @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
          @endif

        <p id="judul">Today's highlight</p>
        <div class="row p-2">
            @foreach ($photo as $temp)
            <div class="col-md-4">
                <a href="{{ url('/details', $temp->id) }}">
                <div><img src="{{ asset('/' . $temp->PhotoURL) }}"></div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
@stop
