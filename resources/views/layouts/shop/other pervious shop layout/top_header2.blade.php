@section('top_header')
    @php
        $total = 0;
        $count = count((array) session('cart'));
        foreach ((array) session('cart') as $id => $details) {
            $total += $details['quantity'] * $details['price'];
        }
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            # code...
        } else {
            # code...
        }
    @endphp
    <!-- Header -->
    <header class="header">
        <div class="top header__top gray-bg d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="message--header__top">
                            <p class="message m-0 dove__gray-color">SayatCart</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="menu--header__top text-right">
                            <nav class="nav--top__list">
                                {{-- <ul class="list-inline">
                                    <li><a class="nav--top__link dove__gray-color text-capitalize position-relative" href="#">store Locator</a></li>
                                    <li><a class="nav--top__link dove__gray-color text-capitalize position-relative" href="#">Track Orders</a></li>
                                    <li><a class="nav--top__link dove__gray-color text-capitalize position-relative" href="#">Credit Card</a></li>
                                    <li class="nav--top__dropdown position-relative"><a class="nav--top__link lang--top__link dove__gray-color text-capitalize position-relative" href="#">English & Dollar<span class="lnr lnr-chevron-down"></span></a>
                                        <ul class="dropdown-show">
                                            <li><a class="dove__gray-color text-capitalize" href="#"><span class="lang">canada</span><span class="currency">USD</span></a></li>
                                            <li><a class="dove__gray-color text-capitalize" href="#"><span class="lang">Bangladesh</span><span class="currency">TAKA</span></a></li>
                                        </ul>
                                    </li>
                                </ul> --}}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="middle header__middle bg--header__middle pt-35 pb-35">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content--header__middle d-flex align-items-center justify-content-between">
                            <div class="logo--header__middle">
                                <div class="logo">
                                    <a class="logo__link" href="/"><img src="img/shop/logo/h1__logo.png"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="search--header__middle h1search--header__middle">
                                <form class="search--header__form position-relative" action="#">
                                    <div class="header--search__box">
                                        <button class="header--search__btn" style="margin-right: 38px;" id="reset"
                                            type="reset">x</button>
                                        <input class="header--search__query" type="text" autocomplete="off"
                                            placeholder="Search For Products..." id="search" name="search">
                                        <button class="header--search__btn"><i class="icofont-search-2"></i></button>
                                    </div>
                                    <div class="header--search__cate">
                                        <select name="search_catagory" id="header--search__main" required>
                                            <option value="" required>Select Categories</option>
                                            @foreach ($catagories as $list)
                                                <option value="{{ $list['catagory_name'] }}" required>
                                                    {{ $list['catagory_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Search Results List -->
                                    <div class="search_view">
                                        <div class="search_back" id="search_view">

                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- Cart place here  --}}
                            <x-shop.cart />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom header__bottom header__bottom--border custom-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-5 col-10">
                        <!-- Extra shopping cart for mobile device start -->
                        <div class="cart--header__middle d-block d-md-none">
                            @if (Auth::check())
                                @if (Auth::user()->hasRole('customers'))
                                    <div class="cart--header__list">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                            <li><a class="mini__cart--link" href="#"><i
                                                        class="fal fa-bags-shopping"><span
                                                            class="cart__count">{{ $count }}</span></i><span
                                                        class="cart__amount">{{ $setting->currency }}
                                                        {{ $total }}</span></a></li>
                                        </ul>
                                    </div>
                                @endif
                                @if (Auth::user()->hasRole('user'))
                                    <div class="cart--header__list">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                            <li><a class="mini__cart--link" href="#"><i
                                                        class="fal fa-bags-shopping"><span
                                                            class="cart__count">{{ $count }}</span></i><span
                                                        class="cart__amount">{{ $setting->currency }}
                                                        {{ $total }}</span></a></li>
                                        </ul>
                                    </div>
                                @endif
                                @if (Auth::user()->hasRole('admin'))
                                    <div class="cart--header__list">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                            <li><a class="mini__cart--link" href="#"><i
                                                        class="fal fa-bags-shopping"><span
                                                            class="cart__count">{{ $count }}</span></i><span
                                                        class="cart__amount">{{ $setting->currency }}
                                                        {{ $total }}</span></a></li>
                                        </ul>
                                    </div>
                                @endif
                            @else
                                <div class="cart--header__list">
                                    <ul class="list-inline">
                                        <li><a href="{{ route('register-client') }}"><i class="fal fa-user-plus"></i></a>
                                        </li>
                                        {{-- <li><a href="#"><i class="fal fa-heart"></i></a></li> --}}
                                        <li><a class="mini__cart--link" href="#"><i class="fal fa-bags-shopping"><span
                                                        class="cart__count">{{ $count }}</span></i><span
                                                    class="cart__amount">{{ $setting->currency }}
                                                    {{ $total }}</span></a></li>
                                    </ul>
                                </div>
                            @endif
                            <div class="mini__cart--box">
                                <ul>
                                    <ul>
                                        @if (session('cart'))
                                            <form action="/customers/session" method="POST" class="needs-validation"
                                                novalidate>
                                                @foreach (session('cart') as $id => $details)
                                                    <li class="mb-20">
                                                        <div class="cart-image">
                                                            <a href="#"><img
                                                                    src="{{ $details['image'] ? asset('storage/' . $details['image']) : asset('img/error/no-image.jpg') }}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="cart-text">
                                                            <a href="#"
                                                                class="title f-400 cod__black-color">{{ $details['product_name'] }}</a>
                                                            <span
                                                                class="cart-price f-400 dusty__gray-color">{{ $details['quantity'] }}x
                                                                &nbsp; <span
                                                                    class="price f-800 cod__black-color">{{ $setting->currency }}
                                                                    &nbsp; {{ $details['price'] }}</span></span>
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="text" class="remove" id="remove"
                                                                value="{{ $id }}" hidden>
                                                        </div>
                                                        <div class="del-button">
                                                            <a href="#"><i class="icofont-close-line"></i></a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                        @endif
                                        <li>
                                            <div class="total-text d-flex justify-content-between">
                                                <span class="f-800 cod__black-color">Total Bag </span>
                                                <span class="f-800 cod__black-color">{{ $setting->currency }} &nbsp;
                                                    {{ $total }}</span>
                                            </div>
                                        </li>
                                        <li>
                                            @if ($total == 0)
                                                <p>Select products</p>
                                            @else
                                                <div class="d-flex justify-content-between">
                                                    <a href="#" class="checkout">Checkout</a>
                                                    <a href="#" class="viewcart">View Cart</a>
                                                </div>
                                            @endif
                                        </li>
                                        </form>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                        <!-- Extra shopping cart for mobile device end -->

                    </div>
                    {{-- <div class="col-xl-9 col-lg-8 col-md-7 col-2">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="about.html">About Us</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('product_trending')}}">Trending</a>
                                    </li>

                                    @foreach ($selected_menu as $menu)
                                    <li>
                                        <a href="{{ route('FilterCatagories')}}?cata={{$menu['catagory_name']}}">{{$menu['catagory_name']}}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </nav>
                        </div>
                    </div> --}}
                    <div class="col-xl-10 offset-xl-1 text-center">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li class="mega-menu static dropdown-icon">
                                        <a href="/">Shop</a>
                                        <ul class="submenu mega-full">
                                            @foreach ($selected_menu as $menu)
                                                <li>
                                                    <a
                                                        href="{{ route('FilterCatagories') }}?cata={{ $menu->catagory_name }}">
                                                        {{ $menu->catagory_name }}
                                                    </a>
                                                    <ul class="submenu  level-1">
                                                        @php
                                                            $products = \App\Models\Shop\Product::latest()
                                                                ->where('product_catagories', '=', $menu->catagory_name)
                                                                ->get()
                                                                ->take(6);
                                                        @endphp
                                                        @foreach ($products as $product)
                                                            <li>
                                                                <a
                                                                    href="{{ route('product_details') }}?pro={{ $product->id }}">{{ $product->product_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    {{-- <li>
                                            <a href="shop.html">Furniture <span class="offer2 new">New</span></a>
                                        </li> --}}

                                    <li>
                                        <a href="{{ route('product_trending') }}">Trending <span
                                                class="offer2">Hot</span></a>
                                    </li>

                                </ul>

                            </nav>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header end /-->
@show
