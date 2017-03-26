@extends('layouts.main')

@section('title')
    Home page
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')

@if(Session::has('cart'))
    <div class="main-container no-sidebar">
        <div class="container">
            <div class="main-content">
                <div class="page-title">
                    <h3>SHOPPING CART</h3>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <table class="shop_table cart">
                            <thead>
                            <tr>
                                <th colspan="2" class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-quantity">Qty</th>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="product-thumbnail"><img src="src/images/products/{{$product['item']['first_img']}}" alt=""></td>
                                <td class="product-name"><a href="#">{{ $product['item']['name'] }}</a></td>
                                <td>{{ $product['item']['price'] }}</td>
                                <td><a href="{{ route('product.addToCartOne', ['id' => $product['item']['id']]) }}">+</a></td>
                                <td><input class="qty" type="text" value="{{ $product['qty'] }}"></td>
                                <td><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">-</a></td>
                                <td>{{ $product['price'] }} грн.</td>
                                <td class="product-remove"><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}"><i class="fa fa-close"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="box-cart-total">
                            <h2 class="title">Корзина</h2>
                            <table>
                                <tr>
                                    <td>Количество</td>
                                    <td><span class="price">{{ $totalQty }}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <td>Цена</td>
                                    <td><span class="price"> {{ $totalPrice }}</span></td>
                                </tr>
                            </table>
                                <a href="{{ route('checkout') }}" type="button" class="button btn-primary medium checkout-button">Перейти к покупке</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection