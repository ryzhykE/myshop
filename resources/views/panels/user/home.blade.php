@extends('layouts.main')

@section('title')
    Home page
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('status')
    @include('partials.status-panel')
@stop

@section('content')






    <div class="main-container no-sidebar">
        <div class="container">
            <div class="main-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <hr>
                        <h2>Мои заказы</h2>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-sm-12 col-md-8">
                                        @foreach($orders as $order)
                                            <hr>
                                            <h3>Заказ№ {{ $order->id }}</h3>
                                            <table class="shop_table cart">
                                            <thead>
                                            <tr>
                                                <th class="product-name">Название</th>
                                                <th class="product-price">Картинка</th>
                                                <th class="product-name">Цена</th>
                                                <th class="product-quantity">Штук</th>
                                                <th class="product-remove">&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order->cart->items as $item)
                                                    <tr>
                                                        <td class="product-name">{{ $item['item']['name'] }}</td>
                                                        <td class="product-thumbnail"><img src="src/images/products/{{ $item['item']['first_img'] }}" alt=""></td>
                                                        <td class="product-name">{{ $item['price'] }} .грн</td>
                                                        <td>{{ $item['qty'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                            <div class="panel-footer">
                                                <strong>Общая сумма: {{ $order->cart->totalPrice }} грн.</strong>
                                            </div>
                                        @endforeach
                                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

@stop