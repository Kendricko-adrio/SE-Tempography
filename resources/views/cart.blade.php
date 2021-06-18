@extends('master')

@section('head')
<title>Home</title>
<link rel="stylesheet" href="{{asset('css/cart.css')}}">
{{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}

@stop

@section('content')

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">YOUR CART</h1>
             </div>
        </section>
        <main>
            <div class="container mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"> </th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" class="text-right">Price</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalPrice=0;
                                    ?>
                                    @if (is_array($cartData) || is_object($cartData))
                                    @foreach ($cartData as $index => $data)
                                    <form method="post" action="updateCart">
                                        @csrf
                                    <?php $totalPrice+=$data['PhotoPrice'];?>
                                    {{-- {{$index}} --}}
                                    <tr>
                                        <td id="photo"><img src="{{ asset('/' . $data['PhotoURL']) }}"></td>
                                        <td>{{ $data['PhotoName'] }}</td>
                                        <td>{{ $data['PhotoPrice'] }} IDR</td>
                                        <td>{{ $data['PhotoDescription']}}</td>
                                        <input type="hidden" name="itemId" value="{{ $data['Id'] }}">
                                        <td class="text-right"></td>
                                        <td class="text-right"><button type="submit" id="delete" name="delete" value="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>

                                    </tr>
                                    </form>
                                    @endforeach
                                    @endif

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Sub-Total</td>
                                        <td class="text-right">{{$totalPrice}}</td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @if ($cartData)
                                        <td class="text-right"></td>
                                        @else
                                        <td class="text-right"></td>
                                        @endif

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Total</strong></td>
                                        @if ($cartData)
                                        <td class="text-right"><strong>{{$totalPrice}}</strong></td>
                                        @else
                                        <td class="text-right"><strong>{{$totalPrice}}</strong></td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="row">
                            <div class="col-sm-12  col-md-6">
                                <form action="/">
                                <button class="btn btn-block btn-light">Continue Shopping</button>
                                </form>
                            </div>

                            <div class="col-sm-12 col-md-6 text-right">
                                @if ($cartData)
                                <form action="/checkout" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-lg btn-block btn-success text-uppercase" value="Checkout">
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>







@stop


