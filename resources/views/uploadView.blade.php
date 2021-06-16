@extends('master')

@section('head')
<title>Upload art</title>
<link rel="stylesheet" href="{{asset('css/uploadView.css')}}">
@stop
@section('content')
<div class="background text-dark">
 
    <div id="minlogin">
        <br><br><br><br>
        <center>

            <form action="/postNewPhoto" method="post" enctype="multipart/form-data">
                @csrf
                <div class="loginTemplate">
                    <div id="loginBig">New Art Details</div>
                    <div class="loginPage">

                        <div class="loginLeft">Name</div>
                        <div class="loginInput"><input type="text" name="name" size="50"></div>
                        <div class="loginLeft">Category</div>
                        <div class="loginInput">
                            <input list="categories" name="category" placeholder="-- Category --">
                            <datalist id="categories">
                                {{-- @foreach($cats as $cat) --}}
                                {{-- <option value="{{$cat->name}}"> --}}
                                    {{-- @endforeach --}}
                                    <option value="--Choose"></option>
                                    <option value="Mixed"></option>
                                    <option value="WildLife"></option>
                                    <option value="Town"></option>
                                    <option value="Automotive"></option>
                                    <option value="Music"></option>
                                       
                            </datalist> 
                        </div>
                        {{-- <div class="loginLeft">Stock</div> --}}
                        {{-- <div class="loginInput"><input type="number" name="stock" min=0></div> --}}
                        <div class="loginLeft">Price</div>
                        <div class="loginInput"><input type="number" name="price" min=0 placeholder="IDR"></div>
                        <div class="loginLeft">Description</div>
                        <div class="loginInput"><textarea name="description" placeholder="Photo Description"></textarea>
                        </div>
                        <div class="loginLeft">Image</div>
                        <div class="loginInput"><input type="file" name="image"></div>
                    </div>

                    <div>
                        <input type="submit" value="Add Item"
                            style="background-color: rgb(73, 73, 73); color:white; height:40px; padding:10px; border:none; border-radius: 6px;">
                    </div>

                    <div>
                        @if ($errors->any())
                            <div class="alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                    </div>

            </form>
    </div>
    </center>
    </div>

</div>
@stop