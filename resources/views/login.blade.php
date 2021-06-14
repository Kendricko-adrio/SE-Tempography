@extends('master')

@section('head')
<title>Login</title>
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@stop
@section('content')
<div class="background text-dark">
    <div class="login">
        <h1 class="">Login</h1>
        <form action="/postLogin" method="post">
            @csrf
            <input class="component" type="text" placeholder="Email" name="email">
            <input class="component" type="password" placeholder="Password" name="password">
            <input class="component button btn-danger btn" type="submit" value="Login">
        </form>

        <div>
            @if ($errors->any())
                    <div class="alert-danger">
                        Invalid email or password !
                    </div>
                @endif
        </div>

        <h4>Does not have account?</h4>
        <button type="button" class="button btn btn-warning">Register Account</button>
    </div>
</div>
@stop
