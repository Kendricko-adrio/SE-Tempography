@extends('master')

@section('head')
<title>User Profile</title>
<link rel="stylesheet" href="{{asset('css/user.css')}}">
@stop

@section('content')
<div class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <div class="description">
            <img class="image" src="https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png" alt="">
            <div class="detail">
                {{-- {{$user}} --}}
                <div>{{$user->name}}</div>
                <div>{{$user->email}}</div>
                {{-- description --}}
                <div>sold</div>
            </div>
        </div>
        <div class="rating">
            hehe
        </div>
    </div>
  </div>

  <div class="container d-flex flex-wrap">
      @foreach ($photo as $p)
      <div class="card m-3" style="width: 20rem;">
        <img class="card-img-top" src="{{asset($p->PhotoURL)}}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text"><h5>{{$p->PhotoName}}</h3></p>
          <p class="card-text">{{$p->PhotoDescription}}</p>
        </div>
      </div>
      @endforeach
  </div>
@stop
