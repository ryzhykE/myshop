
    <div class="main-menu-wapper">
        <div class="row">
            <div class="col-sm-12 col-md-3 logo-wapper">
                <div class="logo">
                    <a href="#"><img src="{{ URL::to('src/images/logos/1.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 menu-wapper">
                <div class="top-header">
                    <span class="mobile-navigation"><i class="fa fa-bars"></i></span>
                    <div class="slogan">"Shop is a reflection of you!"</div>
                    <div class="box-control">
                        <form  class="box-search">
                            <div class="inner">
                                <input type="text" class="search" placeholder="Search here...">
                                <button class="button-search"><span class="pe-7s-search"></span></button>
                            </div>
                        </form>
                        <div class="mini-cart">
                            <a class="cart-link" href="{{ route('product.shopingCart') }}"><span class="icon pe-7s-cart"></span>
                                <span class="count">
                                    {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}
                                </span>  {{ Session::has('cart') ? Session::get('cart')->totalPrice : '0' }} грн.
                            </a>
                            <div class="show-shopping-cart">
                                @if(Session::has('cart'))
                                    <h3 class="title">У ВАС <span class="text-primary">({{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }} предметов)</span> В КОРЗИНЕ</h3>
                                    <ul class="list-product">
                                            @foreach($products as $product)
                                                <li>
                                                    <div class="thumb">
                                                        <img src="src/images/products/{{$product['item']['first_img']}}" alt="">
                                                    </div>
                                                    <div class="info">
                                                        <h4 class="product-name"><a href="#">{{ $product['item']['name'] }}</a></h4>
                                                        <span class="price">{{ $product['qty'] }} x {{ $product['item']['price'] }} .грн</span>
                                                        <a class="remove-item" href="#"><i class="fa fa-close"></i></a>
                                                    </div>
                                                </li>
                                            @endforeach

                                    </ul>

                                <div class="sub-total">
                                    {{ Session::get('cart')->totalPrice }} грн.
                                </div>
                                <div class="group-button">
                                    <a href="{{ route('product.shopingCart') }}" class="button">Shopping Cart</a>
                                </div>
                                    @else
                                    <p>корзина пуста</p>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="boutique-nav main-menu clone-main-menu">
                    <li  class="current">
                        <a href="{{ url('/') }}">Главная</a>
                    </li>
                    @if($menu)
                        @include('partials.navigation',['items' => $menu->roots()])
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>












