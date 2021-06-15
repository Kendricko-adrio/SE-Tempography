@extends('master')

@section('head')
<title>User Profile</title>
<link rel="stylesheet" href="{{asset('css/user.css')}}">
@stop

@section('content')
<div class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <div class="description">
            <img class="image" src="{{asset($user->profile_image)}}" alt="">
            <div class="detail">
                {{-- {{$user}} --}}
                <div>{{$user->name}}</div>
                <div>{{$user->email}}</div>
                <div>{{$user->description}}</div>
                <div>sold</div>
            </div>
        </div>
        <div class="rating">
            Rating
        </div>
    </div>
  </div>

  <div class="content container d-flex flex-wrap justify-content-center">
      @if ($photo->count() == 0)
          <h1>No Photo Available For Now</h1>
      @endif
      @foreach ($photo as $p)
      <a href="{{url('/details/'. $p->id)}}">
        <div class="card m-3" style="width: 15rem;">
            <img class="card-img-top asset" src="{{asset($p->PhotoURL)}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text"><h5>{{$p->PhotoName}}</h3></p>
              <p class="card-text">{{$p->PhotoDescription}}</p>
            </div>
          </div>
      </a>
      @endforeach
  </div>
@stop
