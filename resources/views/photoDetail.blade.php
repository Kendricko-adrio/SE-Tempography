@extends('master')

@section('head')
<title>Photo Details</title>
<link rel="stylesheet" href="{{asset('css/photoDetail.css')}}">
@stop
@section('content')
<div class="background text-dark">


    <br><br><br>
    <div class="detailContainer">
        <div id="judulDetail">Photo Details</div>

        <form method="post" action="/addToCart">
            @csrf
        <div id="detailInfos">
        <div id="gambarDetail">
            <img src="{{ asset('/' . $detailPhoto->PhotoURL) }}">
        </div>
        <div id="penjelasanDetail">
        <div>Name : {{$detailPhoto->PhotoName}}</div>
        <div>Description : {{$detailPhoto->PhotoDescription}}</div>
        <div>Price : {{ $detailPhoto->PhotoPrice }} IDR</div>
        <div></div>

        <input type="hidden" value={{$detailPhoto->id}} name="itemId">

        <div>
            @if ($errors->any())
                    <div class="alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif
            </div>
            <div><br></div>
            <div><br></div>
            <div><br></div>
        <div class="rounded-pill">
           <input type="submit" value="Add To Cart" >
        </div>
        </div>

        </div>

    </form>
    </div>

</div>
@stop
