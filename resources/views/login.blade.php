@extends('master')

@section('head')
<title>Login</title>
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@stop
@section('content')
<div class="background text-dark">
    <div class="login">
        <h1 class="">Login</h1>
        <form action="">
            <input class="component" type="text" placeholder="Email">
            <input class="component" type="password" placeholder="Password">
            <input class="component button btn-danger btn" type="submit" value="Login">
        </form>
        <h4>Does not have account?</h4>
        <button type="button" class="button btn btn-warning"><a href="{{url('register')}}">Register Account</a> </button>
    </div>
</div>
@stop
