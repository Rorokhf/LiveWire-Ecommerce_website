<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"
        integrity="sha512-cOGz9gyEibwgs1MVDCcfmQv6mPyUkfvrV9TsRbTuOA12SQnLzBROihf6/jK57u0YxzlxosBFunSt4V75K6azMw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css"
        integrity="sha512-cOGz9gyEibwgs1MVDCcfmQv6mPyUkfvrV9TsRbTuOA12SQnLzBROihf6/jK57u0YxzlxosBFunSt4V75K6azMw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css"
        integrity="sha512-8czuHxKbajKuQfbgBv5iwqftC1PbeLPmgVOYo8ZDlcOdi0OV18E+BbGQdqXs490kV9ZmJQTNupd0kvW8hokJlw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>

<body class="home-page home-01 ">


    <!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

    <!--header-->
    <header id="header" class="header header-style-1">
        <div class="container-fluid">
            <div class="row">
                <div class="topbar-menu-area">
                    <div class="container">
                        <div class="topbar-menu left-menu">
                            <ul>
                                <li class="menu-item">
                                    <a title="Hotline: (+123) 456 789" href="#"><span
                                            class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                                </li>
                            </ul>
                        </div>
                        <div class="topbar-menu right-menu">
                            <ul>

                                <li class="menu-item lang-menu menu-item-has-children parent">
                                    <a title="English" href="#"><span class="img label-before"><img
                                                src="{{ asset('assets/images/lang-en.png') }}"
                                                alt="lang-en"></span>English<i class="fa fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    <ul class="submenu lang">
                                        <li class="menu-item"><a title="hungary" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{ asset('assets/images/lang-hun.png') }}"
                                                        alt="lang-hun"></span>Hungary</a></li>
                                        <li class="menu-item"><a title="german" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{ asset('assets/images/lang-ger.png') }}"
                                                        alt="lang-ger"></span>German</a></li>
                                        <li class="menu-item"><a title="french" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{ asset('assets/images/lang-fra.png') }}"
                                                        alt="lang-fre"></span>French</a></li>
                                        <li class="menu-item"><a title="canada" href="#"><span
                                                    class="img label-before"><img
                                                        src="{{ asset('assets/images/lang-can.png') }}"
                                                        alt="lang-can"></span>Canada</a></li>
                                    </ul>
                                </li>

                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->utype === 'ADM')
                                            {{-- Admin --}}

                                            <li class="menu-item menu-item-has-children parent">
                                                <a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i
                                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                                <ul class="submenu curency">
                                                    <li class="menu-item">
                                                        <a title="Dashboard"
                                                            href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="categories"
                                                            href="{{ route('amin.categories') }}">Categories</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="products" href="{{ route('admin.products') }}">All
                                                            Products</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="attrbute-products" href="{{ route('admin.attrebute-product') }}">Attrbute
                                                            Products</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="HomeSlider" href="{{ route('admin.slider') }}">Manage
                                                            Home Slider</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="ManageHome"
                                                            href="{{ route('admin.homecategories') }}">Manage Home
                                                            Categories</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="SaleSetting" href="{{ route('admin.sale') }}">Sale
                                                            Setting</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="coupon" href="{{ route('admin.coupon') }}">Coupons</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="orders" href="{{ route('admin.orders') }}">Orders</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="contact" href="{{ route('admin.contact') }}">Contact us</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="setting" href="{{ route('admin.setting') }}">Setting</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                    </li>
                                                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                        @csrf

                                                    </form>
                                                </ul>
                                            </li>
                                        @else
                                            {{-- user --}}
                                            <li class="menu-item menu-item-has-children parent">
                                                <a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i
                                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                                <ul class="submenu curency">
                                                    <li class="menu-item">
                                                        <a title="Dashboard"
                                                            href="{{ route('user.dashboard') }}">Dashboard</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="order" href="{{ route('user.order') }}">Orders</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="profile" href="{{ route('user.profile') }}">Profile</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="pass" href="{{route('user.change-password')}}">Change password</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form') .submit();">Logout</a>
                                                    </li>
                                                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                        @csrf

                                                    </form>
                                                </ul>
                                            </li>
                                        @endif
                                    @else
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('login') }}">Login</a></li>
                                        <li class="menu-item"><a title="Register or Login"
                                                href="{{ route('register') }}">Register</a></li>
                                    @endif

                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="mid-section main-info-area">

                            <div class="wrap-logo-top left-section">
                                <a href="index.html" class="link-to-home"><img
                                        src="{{ asset('assets/images/logo-top-1.png') }}" alt="mercado"></a>
                            </div>

                            @livewire('header-search-component')

                            <div class="wrap-icon right-section">
                                @livewire('wishlist-count-component')

                                @livewire('cart-count-component')
                                <div class="wrap-icon-section show-up-after-1024">
                                    <a href="#" class="mobile-navigation">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="nav-section header-sticky">
                        <div class="header-nav-section">
                            <div class="container">
                                <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
                                    <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span
                                            class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span
                                            class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Top new items</a><span
                                            class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span
                                            class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span
                                            class="nav-label hot-label">hot</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="primary-nav-section">
                            <div class="container">
                                <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                                    <li class="menu-item home-icon">
                                        <a href="/" class="link-term mercado-item-title"><i class="fa fa-home"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="about-us.html" class="link-term mercado-item-title">About Us</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/shop" class="link-term mercado-item-title">Shop</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/cart" class="link-term mercado-item-title">Cart</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/checkout" class="link-term mercado-item-title">Checkout</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('contact')}}" class="link-term mercado-item-title">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{ $slot }}

      @livewire('footer-component')

        <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
                integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
                integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"
                integrity="sha512-PDFb+YK2iaqtG4XelS5upP1/tFSmLUVJ/BVL8ToREQjsuXC5tyqEfAQV7Ca7s8b7RLHptOmTJak9jxlA2H9xQA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.js"
                integrity="sha512-0Z2o7qmtl7ixxWcEQxxTCT8mX4PsdffSGoVJ7A80zqt6DvdEHF800xrsSmKPkSoUaHtlIhkLAhCPb/tkf78SCA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.tiny.cloud/1/191slbqwvt7eyq3nd8vxz35px0q5gcq4stpx5gd3m78cygrb/tinymce/5/tinymce.min.js"
                referrerpolicy="origin"></script>
        @livewireScripts

        @stack('scripts')
    </body>

    </html>