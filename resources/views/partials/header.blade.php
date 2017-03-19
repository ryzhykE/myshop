
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
                            <a class="cart-link" href="#"><span class="icon pe-7s-cart"></span> <span class="count">3</span> $255.00</a>
                            <div class="show-shopping-cart">
                                <h3 class="title">YOU HAVE <span class="text-primary">(3 ITEMS)</span> IN YOUR CART</h3>
                                <ul class="list-product">
                                    <li>
                                        <div class="thumb">
                                            <img src="images/products/1.png" alt="">
                                        </div>
                                        <div class="info">
                                            <h4 class="product-name"><a href="#">LONDON STAR SWEATSHIRT</a></h4>
                                            <span class="price">1x£375.00</span>
                                            <a class="remove-item" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb">
                                            <img src="images/products/1.png" alt="">
                                        </div>
                                        <div class="info">
                                            <h4 class="product-name"><a href="#">LONDON STAR SWEATSHIRT</a></h4>
                                            <span class="price">1x£375.00</span>
                                            <a class="remove-item" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="sub-total">
                                    Subtotal:£255.00
                                </div>
                                <div class="group-button">
                                    <a href="#" class="button">Shopping Cart</a>
                                    <a href="#" class="check-out button">CheckOut</a>
                                </div>
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












