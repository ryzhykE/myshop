<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="{{ (isset($meta_desc)) ? $meta_desc : ''}}">
    <meta name="keywords" content="{{ (isset($keywords)) ? $keywords : ''}}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('src/img/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/style.css') }}">

    @yield('head')
</head>

<body>
<div id="box-mobile-menu" class="box-mobile-menu full-height full-width">
    <div class="box-inner">
        <span class="close-menu"><span class="icon pe-7s-close"></span></span>
    </div>
</div>
<div id="header-ontop" class="is-sticky"></div>
<header id="header" class="header style3">
    @include('partials.above-navbar-alert')
    <div class="container">
        <div class="topbar">
            <ul class="boutique-nav topbar-menu left">
                <li><a href="#"><i class="fa fa-phone"></i>Call Us: +380504421231</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i>evgenii_r84@mail.ru</a></li>
            </ul>
            <ul class="boutique-nav topbar-menu right">
                <li class="menu-item-has-children">
                    <a href="#"><i class="fa fa-lock"></i> Account</a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href=""><i class="fa fa-heart"></i> Wishlist</a>
                        </li>
                        @if(!Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('register') }}"><i class="fa fa-registered"></i> Register</a>
                            </li>
                        @else
                            <li class="nav-item">

                                <a class="nav-link" href="{{ Auth::user()->homeUrl() }}"><i class="fa fa-user"></i> {{ Auth::user()->first_name }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>

    @yield('header')

</header>

    @yield('slider')

<div class="container">
    <span class="line margin-top-30"></span>
</div>

@yield('content')
@yield('status')


<div class="margin-top-60 section-lasttest-blog no-border">
    <div class="container">
        <div class="section-title text-center"><h3>Our BLog</h3></div>
        <div class="lastest-blog owl-carousel nav-center-center nav-style7" data-nav="true" data-dots="false" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":2}}'>
            <div class="item-blog">
                <div class="left">
                    <div class="blog-date">
                        <span class="day">7</span>
                        <span class="month">/SEP</span><br>
                        <span class="year">2015</span>
                    </div>
                    <h3 class="blog-title"><a href="#">We're the best Designers from UK</a></h3>
                    <div class="meta">
                        <span class="author">John Doe</span>
                        <span class="comment"><i class="fa fa-comment"></i> 36 comments</span>
                    </div>
                </div>
                <div class="right">
                    <a class="banner-border" href="#"><img src="images/blogs/1.jpg" alt=""></a>
                </div>
            </div>
            <div class="item-blog">
                <div class="left">
                    <div class="blog-date">
                        <span class="day">7</span>
                        <span class="month">/SEP</span><br>
                        <span class="year">2015</span>
                    </div>
                    <h3 class="blog-title"><a href="#">We're the best Designers from UK</a></h3>
                    <div class="meta">
                        <span class="author">John Doe</span>
                        <span class="comment"><i class="fa fa-comment"></i> 36 comments</span>
                    </div>
                </div>
                <div class="right">
                    <a class="banner-border" href="#"><img src="images/blogs/2.jpg" alt=""></a>
                </div>
            </div>
            <div class="item-blog">
                <div class="left">
                    <div class="blog-date">
                        <span class="day">7</span>
                        <span class="month">/SEP</span><br>
                        <span class="year">2015</span>
                    </div>
                    <h3 class="blog-title"><a href="#">We're the best Designers from UK</a></h3>
                    <div class="meta">
                        <span class="author">John Doe</span>
                        <span class="comment"><i class="fa fa-comment"></i> 36 comments</span>
                    </div>
                </div>
                <div class="right">
                    <a class="banner-border" href="#"><img src="images/blogs/1.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer style2">
    <div class="footer-top">
        <div class="container">
            <div class="row flex-flow">
                <div class="col-xs-12 col-sm-12 col-md-6 footer-sidebar">
                    <div class="widget contact-info">
                        <span class="text-primary PlayfairDisplay">Talk to Us Now !</span>
                        <h3 class="widget-title">Contact Us</h3>
                        <div class="content">
                            <p class="address">5701 Outlets at Tejon Pkwy, Tejon ranch CA 93203 UK.</p>
                            <p class="phone"><i class="fa fa-phone"></i> (+800) 6868 2268</p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12  col-sm-12 col-md-6 footer-sidebar">
                    <div class="widget widget_social style11">
                        <span class="text-primary PlayfairDisplay">Talk to Us Now !</span>
                        <h3 class="widget-title">FOLLOW US</h3>
                        <div class="content">
                            <div class="social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    <!-- Placed at the end of the document so the pages load faster
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"></script>

    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>-->

    <script src="{{ URL::to('src/lib/nivo-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>

    <a href="#" class="scroll_top" title="Scroll to Top" style="display: block;"><i class="fa fa-arrow-up"></i></a>
    <script type="text/javascript" src="{{ URL::to('src/js/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/js/mdb.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/Modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/lightbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/masonry.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/imagesloaded.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/jquery.parallax-1.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/masonry.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/functions.js') }}"></script>
@yield('footer')

</body>
</html>
