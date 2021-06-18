@extends('master')

@section('head')
<link rel="stylesheet" href="{{asset('css/history.css')}}">
@stop

@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">YOUR HISTORY</h1>
     </div>
</section>
<main class="container">
    <table class="table table-striped">
        <tr>
            <th>Image</th>
            <th>Photo Name</th>
            <th>Buy At</th>
            <th>Button</th>
        </tr>
        @foreach ($transaction as $index => $row)
        <tr>
            <td>
                <img class="image" src="{{asset($row->PhotoURL)}}" alt="">
            </td>
            <td>{{$row->PhotoName}}</td>
            <td>{{$row->created_at}}</td>
            <td>
                <form action="{{url('/myhistory/'. $row->photo_id)}}" method="POST">
                    @csrf
                    <input class="btn btn-success" type="submit" value="Download">
                </form>
            </td>

            {{-- <td>lala</td> --}}
        </tr>
        @endforeach
    </table>
</main>
@stop
