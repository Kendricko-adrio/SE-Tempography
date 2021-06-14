@extends('master')

@section('head')
<title>Home</title>
<link rel="stylesheet" href="{{asset('css/cart.css')}}">
{{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}

@stop

@section('content')

{{-- @if (is_array($cartData) || is_object($cartData))
@foreach ($cartData as $index => $data)
                <form method="post" action="updateCart">
                    @csrf
                    <div class="itemCart">
                        <div><img src="{{ asset('/' . $data['PhotoURL']) }}"></div>
                        <div class="infoCart" style="color: rgb(172, 0, 0);">{{ $data['PhotoName'] }}</div>
                        <div class="infoCart">{{ $data['PhotoPrice'] }}</div>
                        <input type="hidden" name="index" value="{{ $index }}">
                            <input type="submit" id="update" value="Update">
                        </div>
                        <div class="infoCart"><input type="submit" id="delete" name="delete" value="Delete" /></div>
                    </div>
                </form>
                <hr style="border-top: 5px solid rgb(224, 224, 224);">
            @endforeach
            @else
            <p style="font-size:30px; margin:30px;">Your cart is currently empty !</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        @endif --}}



        
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">YOUR CART</h1>
             </div>
        </section>
        
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
                                <?php $totalPrice+=$data['PhotoPrice'];?>
                                <tr>
                                    <td id="photo"><img src="{{ asset('/' . $data['PhotoURL']) }}"></td>
                                    <td>{{ $data['PhotoName'] }}</td>
                                    <td>{{ $data['PhotoPrice'] }} IDR</td>
                                    <td>{{ $data['PhotoDescription']}}</td>
                                    <td class="text-right"></td>
                                    <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                                </tr>
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
                                    <td>Shipping</td>
                                    <td class="text-right">6,90 €</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><strong>346,90 €</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-6">
                            <button class="btn btn-block btn-light">Continue Shopping</button>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
 


@stop


