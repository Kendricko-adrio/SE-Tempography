@extends('master')
<link rel="stylesheet" href="{{asset('css/search.css')}}">
@section('head')
@stop

@section('content')
<main>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>Image</th>
                <th>Photo Name</th>
                <th>Photo Description</th>
                <th>Price</th>
            </tr>
            @foreach ($photo as $index => $row)

                <tr>
                    <td>
                        <a href="{{url('/details/'. $row->id)}}">
                            <img class="image" src="{{asset($row->PhotoURL)}}" alt="">
                        </a>

                    </td>
                    <td>{{$row->PhotoName}}</td>
                    <td>{{$row->PhotoDescription}}</td>
                    <td>Rp. {{$row->PhotoPrice}}</td>

                    {{-- <td>lala</td> --}}
                </tr>


            @endforeach
        </table>
    </div>
</main>
@stop
