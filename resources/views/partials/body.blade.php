@if(Session::has('success'))
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <div id="charge-message" class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
@endif

<div class="margin-top-55">
    <div class="container">
        <div class="tab-product tab-product-fade-effect">
            <ul class="box-tabs nav-tab">
                <li class="active"><a data-animated="" data-toggle="tab" href="#tab-1">Best Sellers</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-container">
                    <div id="tab-1" class="tab-panel active">
                        <ul class="product-list-grid2 tab-list owl-carousel-mobile" data-nav="false" data-dots="false" data-margin="0" data-loop="true"  data-items="1">
                        @foreach($prod as $product)
                            <li class="product-item style3 mobile-slide-item col-sm-4 col-md-3">
                                <div class="product-inner">
                                    <div class="product-thumb has-back-image">
                                        <a href="#"><img src="src/images/products/{{$product->first_img}}" alt="{{ $product->name }}"></a>
                                        <a class="back-image" href="#"><img src="src/images/products/{{$product->sec_img}}" alt="{{ $product->name }}"></a>
                                        <div class="gorup-button">
                                            <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h4><a href="#">{{ $product->name }}</a></h4>
										<span class="price">
											<ins>{{ $product->price }} .грн</ins>
										</span>
                                        <a href="{{ route('product.addToCart', ['id' => $product->id ]) }}" class="button add_to_cart_button">Добавить в корзину</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
