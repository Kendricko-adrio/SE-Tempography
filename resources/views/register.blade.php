@extends('master')

@section('head')
<title>Login</title>
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@stop
@section('content')
<div class="background text-dark">
    <div class="login">
        <h1 class="">Register</h1>
        <form action="{{url('register')}}" method="POST">
            {{ csrf_field() }}
            <input class="component" name="fullname" type="text" placeholder="Full Name">
            <input class="component" name="email" type="email" placeholder="Email">
            <input class="component" name="password" type="password" placeholder="Password">
            <input class="component" name="confirm" type="password" placeholder="Confirm Password">
            <input class="component button btn-danger btn" type="submit" value="Login">
        </form>

    </div>
</div>
@stop
