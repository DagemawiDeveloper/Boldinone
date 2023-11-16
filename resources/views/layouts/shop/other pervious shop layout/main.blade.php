@section('main')
    @php
        $now = date('Y-m-d');
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            # code...
        } else {
            # code...
        }
    @endphp
    <!-- Main -->
    <main class="main--wrapper">
        <!-- hero  -->
        <section class="hero hero__area">
            <div class="hero__active slider-active">
                @foreach ($slidelist as $slide)
                    <div class="single__hero single-slider hero__bg pt-140 pb-120"
                        data-background="{{ $slide->slide_image ? asset('storage/' . $slide->slide_image) : asset('img/error/no-image.jpg') }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9 offset-lg-3">
                                    <div class="hero__caption">
                                        <span class="offer--title__hero f-800" data-animation="fadeInDown" data-delay=".2s"
                                            style="color: {{ $slide->subject_color }}">{{ $slide->subject }}</span>
                                        <h2 class="product--name__hero  f-200 mb-50" data-animation="fadeInUp"
                                            data-delay=".5s" style="color: {{ $slide->title_color }}">{{ $slide->title }}
                                        </h2>
                                        <p class="product--price__hero  mb-20" data-animation="fadeInLeft" data-delay=".7s">
                                            <span class="f-300">@php echo $slide['promote_des']; @endphp</span>
                                        </p>
                                        {{-- <a href="#" class="btn orange-bg-btn f-700" data-animation="fadeInDown"
                                            data-delay=".9s">Start Buying</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- hero end -->

        <!-- what shop-max offer -->
        <section class="offer gray-bg pt-60 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="offer__section--text pt-25 mb-75">
                            <h4 class="offer-title f-800 black-color position-relative mb-40">What {{ $setting->webname }}
                                Offer?</h4>
                            <p>Lorem Ipsum is simply dummy texting of the printings and typesettingi amet industry. Simply
                                Dummy
                                has been the industry's standard dummy text ever since 1500s exting of the printing and
                                typesetting amet industry.</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="features mb-25">
                            <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-6">
                                    <div class="features-box d-flex align-items-center justify-content-between mb-10">
                                        <div class="features--box__text">
                                            <h5 class="f-700 pure__black-color"><a href="#">Easy & Free Return</a>
                                            </h5>
                                            <p>All Over Worldwide</p>
                                        </div>
                                        <div class="features--box__icon">
                                            <i><img src="img/shop/icon/money-back-gurantee.svg" alt=""></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6">
                                    <div class="features-box d-flex align-items-center justify-content-between mb-10">
                                        <div class="features--box__text">
                                            <h5 class="f-700 pure__black-color"><a href="#">Money Guarantee</a></h5>
                                            <p>Seal Of Trusts</p>
                                        </div>
                                        <div class="features--box__icon">
                                            <i><img src="img/shop/icon/money-back-gurantee.svg" alt=""></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6">
                                    <div class="features-box d-flex align-items-center justify-content-between mb-10">
                                        <div class="features--box__text">
                                            <h5 class="f-700 pure__black-color"><a href="#">Online Need Helps</a></h5>
                                            <p>24/7 Online Support</p>
                                        </div>
                                        <div class="features--box__icon">
                                            <i><img src="img/shop/icon/money-back-gurantee.svg" alt=""></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 d-lg-none d-xl-block">
                                    <div class="features-box d-flex align-items-center justify-content-between mb-10">
                                        <div class="features--box__text">
                                            <h5 class="f-700 pure__black-color"><a href="#">Gift Card & Voucher</a>
                                            </h5>
                                            <p>Item per Month</p>
                                        </div>
                                        <div class="features--box__icon">
                                            <i><img src="img/shop/icon/money-back-gurantee.svg" alt=""></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="offer-banner offer--banner__bg mb-30"
                            data-background="{{ $setting->left_advert ? asset('storage/' . $setting->left_advert) : asset('img/error/no-image.jpg') }}">
                            <div class="offer--banner__text">
                                <span class="f-200 white-color">@php echo $setting->left_advert_des; @endphp</span>
                                {{-- <h4 class="white-color f-900 mb-40">40% Flate</h4> --}}

                                @if ($setting->left_advert_target == null)
                                    <a href="#">View Collection<i class="icofont-long-arrow-right"></i></a>
                                @else
                                    <a href="{{ route('FilterCatagories') }}?cata={{ $setting['left_advert_target'] }}">View
                                        Collection<i class="icofont-long-arrow-right"></i></a>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="offer-banner offer--banner__bg mb-30"
                            data-background="{{ $setting->right_advert ? asset('storage/' . $setting->right_advert) : asset('img/error/no-image.jpg') }}">
                            <div class="offer--banner__text">
                                <span class="f-200 white-color">@php echo $setting->right_advert_des; @endphp</span>
                                {{-- <h4 class="white-color f-900 mb-40">50% Flate</h4> --}}
                                @if ($setting->right_advert_target == null)
                                    <a href="#">View Collection<i class="icofont-long-arrow-right"></i></a>
                                @else
                                    <a href="{{ route('FilterCatagories') }}?cata={{ $setting['right_advert_target'] }}">View
                                        Collection<i class="icofont-long-arrow-right"></i>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- what shop-max offer end -->

        <!-- Discover All Product  -->
        <section class="all__product pt-80 pb-20">
            <div class="all__product--nav">
                <div class="container">
                    <div class="row all__product--row align-items-center justify-content-between">
                        <div class="col-xl-9 col-md-9">
                            <div class="all__product--menu mb-30">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link btn orange-bg-btn pure__black-color" id="nav-home-tab"
                                            data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                                            aria-selected="true">Trending Items</a>
                                        <a class="nav-item nav-link btn gray-bg-btn pure__black-color" id="nav-profile-tab"
                                            data-toggle="tab" href="#nav-profile" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">Discounted Items</a>
                                        {{-- <a class="nav-item nav-link btn gray-bg-btn pure__black-color"
                                            id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                                            aria-controls="nav-contact" aria-selected="false">Popular Product</a> --}}
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3">
                            <div class="all__product--link text-right mb-30">
                                <a class="all-link" href="FilterCatagories?all=all">Discover All Products<span
                                        class="lnr lnr-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="all__product--body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="product__active owl-carousel">
                                        @foreach ($product_trending as $products)
                                            <div class="product__single">
                                                <div class="product__box">

                                                    <div class="product__thumb">
                                                        <a href="{{ route('product_details') }}?pro={{ $products->id }}"
                                                            class="img-wrapper">
                                                            <img class="img"
                                                                src="{{ $products['main_image'] ? asset('storage/' . $products['main_image']) : asset('img/error/no-image.jpg') }}"
                                                                alt="">
                                                            {{-- <img class="img secondary-img" src="img/shop/allproducts/products__thumb__04.jpg" alt=""> --}}
                                                        </a>
                                                    </div>
                                                    <div class="product__content--top">
                                                        <span class="cate-name">{{ $products->product_brand }}</span>
                                                        <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                                href="{{ route('product_details') }}?pro={{ $products->id }}">
                                                                {{ $products->product_name }}
                                                            </a></h6>
                                                    </div>
                                                    @php
                                                        $get_reviews = \App\Models\Shop\Reviews::where('product_id', $products->id)->avg('rated');
                                                        $avg = intval($get_reviews);
                                                    @endphp
                                                    <div class="product__content--rating d-flex justify-content-between">
                                                        <div class="rating">
                                                            @if ($get_reviews == null)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="2"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="3"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="4"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="5"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                </ul>
                                                            @elseif($avg == 1)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li value="2" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="3" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="4" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="5" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                </ul>
                                                            @elseif($avg == 2)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="2"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li value="3" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="4" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="5" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                </ul>
                                                            @elseif($avg == 3)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="2"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="3"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li value="4" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="5" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                </ul>
                                                            @elseif($avg == 4)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="2"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="3"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="4"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li value="5" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                </ul>
                                                            @elseif($avg == 5)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="2"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="3"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="4"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="5"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                        </div>
                                                        <div class="price">
                                                            <h5 class="grenadier-color f-600">
                                                                {{ $setting->currency }}&nbsp;{{ number_format($products->product_logical_price, 2) }}
                                                            </h5>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="product-action">
                                                    @if (Auth::check())
                                                        @if (\App\Models\Shop\Whishlist::where('product_id', $products->id)->where('user_id', Auth::id())->exists())
                                                            @foreach ($whishlist as $whishlists)
                                                                @if ($whishlists->product_id == $products->id)
                                                                    <a
                                                                        href="{{ route('customers.whishList') }}?pro_unwhish={{ $products->id }}"><span
                                                                            class="fa fa-heart"
                                                                            style="color: #ff2600;"></span></a>
                                                                    <a href="#"><span
                                                                            class="lnr lnr-eye"></span></a>
                                                                    <a href="{{ route('add_to_cart', $products->id) }}"><span
                                                                            class="lnr lnr-cart"></span></a>
                                                                @endif
                                                            @endforeach
                                                        @elseif(\App\Models\Shop\Whishlist::where('product_id', $products->id)->where('user_id', Auth::id())->doesntExist())
                                                            <a
                                                                href="{{ route('customers.whishList') }}?pro_whish={{ $products->id }}"><span
                                                                    class="lnr lnr-heart"></span></a>
                                                            <a href="#"><span class="lnr lnr-eye"></span></a>
                                                            <a href="{{ route('add_to_cart', $products->id) }}"><span
                                                                    class="lnr lnr-cart"></span></a>
                                                            {{-- <a href="#"><span class="lnr lnr-sync"></span></a> --}}
                                                        @endif
                                                    @else
                                                        <a
                                                            href="{{ route('customers.whishList') }}?pro_whish={{ $products->id }}"><span
                                                                class="lnr lnr-heart"></span></a>
                                                        <a href="#"><span class="lnr lnr-eye"></span></a>
                                                        <a href="{{ route('add_to_cart', $products->id) }}"><span
                                                                class="lnr lnr-cart"></span></a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="product__active owl-carousel">
                                        @foreach ($product_discount as $products)
                                            <div class="product__single">
                                                <div class="product__box">
                                                    <div class="product__thumb">
                                                        <a href="{{ route('product_details') }}?pro={{ $products->id }}"
                                                            class="img-wrapper">
                                                            <img class="img"
                                                                src="{{ $products->main_image ? asset('storage/' . $products->main_image) : asset('img/error/no-image.jpg') }}"
                                                                alt="">
                                                            {{-- <img class="img secondary-img" src="img/shop/allproducts/products__thumb__02.jpg" alt=""> --}}
                                                        </a>
                                                    </div>
                                                    <div class="product__content--top">
                                                        <span class="cate-name">{{ $products->product_brand }}</span>
                                                        <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                                href="{{ route('product_details') }}?pro={{ $products->id }}">
                                                                {{ $products->product_name }}
                                                            </a></h6>
                                                    </div>

                                                    <div class="product__content--rating d-flex justify-content-between">
                                                        <div class="rating">
                                                            @php
                                                                $get_reviews = \App\Models\Shop\Reviews::where('product_id', $products->id)->avg('rated');
                                                                $avg = intval($get_reviews);
                                                            @endphp
                                                            @if ($get_reviews == null)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="2"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="3"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="4"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="5"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                </ul>
                                                            @elseif($avg == 1)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li value="2" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="3" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="4" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="5" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                </ul>
                                                            @elseif($avg == 2)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="2"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li value="3" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="4" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="5" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                </ul>
                                                            @elseif($avg == 3)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="2"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="3"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li value="4" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li value="5" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                </ul>
                                                            @elseif($avg == 4)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="2"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="3"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="4"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li value="5" name="product_rating"><i
                                                                            class="fas fa-star"></i></li>
                                                                </ul>
                                                            @elseif($avg == 5)
                                                                <ul class="list-inline">
                                                                    <li class="rating-active" value="1"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="2"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="3"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="4"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active" value="5"
                                                                        name="product_rating"><i class="fas fa-star"></i>
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                        </div>
                                                        <div class="price">
                                                            <h5 class="grenadier-color f-600">
                                                                {{ $setting->currency }}&nbsp;{{ $products->product_logical_price }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-action">
                                                    @if (Auth::check())
                                                        @if (\App\Models\Shop\Whishlist::where('product_id', $products->id)->where('user_id', Auth::id())->exists())
                                                            @foreach ($whishlist as $whishlists)
                                                                @if ($whishlists->product_id == $products->id)
                                                                    <a href="#"><span class="fa fa-heart"
                                                                            style="color: #ff2600;"></span></a>
                                                                    <a href="#"><span
                                                                            class="lnr lnr-eye"></span></a>
                                                                    <a href="{{ route('add_to_cart', $products->id) }}"><span
                                                                            class="lnr lnr-cart"></span></a>
                                                                @endif
                                                            @endforeach
                                                        @elseif(\App\Models\Shop\Whishlist::where('product_id', $products->id)->where('user_id', Auth::id())->doesntExist())
                                                            <a
                                                                href="{{ route('customers.whishList') }}?pro_whish={{ $products->id }}"><span
                                                                    class="lnr lnr-heart"></span></a>
                                                            <a href="#"><span class="lnr lnr-eye"></span></a>
                                                            <a href="{{ route('add_to_cart', $products->id) }}"><span
                                                                    class="lnr lnr-cart"></span></a>
                                                            {{-- <a href="#"><span class="lnr lnr-sync"></span></a> --}}
                                                        @endif
                                                    @else
                                                        <a
                                                            href="{{ route('customers.whishList') }}?pro_whish={{ $products->id }}"><span
                                                                class="lnr lnr-heart"></span></a>
                                                        <a href="#"><span class="lnr lnr-eye"></span></a>
                                                        <a href="{{ route('add_to_cart', $products->id) }}"><span
                                                                class="lnr lnr-cart"></span></a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="product__active owl-carousel">
                                        <div class="product__single">
                                            <div class="product__box">
                                                <div class="product__thumb">
                                                    <a href="product-details.html" class="img-wrapper">
                                                        <img class="img" src="img/shop/allproducts/products__thumb__01.jpg" alt="">
                                                        <img class="img secondary-img" src="img/shop/allproducts/products__thumb__02.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__content--top">
                                                    <span class="cate-name">SAMSUNG 3</span>
                                                    <h6 class="product__title mine__shaft-color f-700 mb-0"><a href="product-details.html">Wireless Audioing Systems Purple
                                                            Degree</a></h6>
                                                </div>
                                                <div class="product__content--rating d-flex justify-content-between">
                                                    <div class="rating">
                                                        <ul class="list-inline">
                                                            <li class="rating-active"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active"><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="price">
                                                        <h5 class="grenadier-color f-600">$2,299.00</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-action">
                                                <a href="#"><span class="lnr lnr-heart"></span></a>
                                                <a href="#"><span class="lnr lnr-eye"></span></a>
                                                <a href="#"><span class="lnr lnr-cart"></span></a>
                                                <a href="#"><span class="lnr lnr-sync"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
        <!-- Discover All Product end -->

        <!-- offer heading  -->
        <div class="offer__heading grenadier-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="offer__heading--title text-center">
                            <p class="mb-0"><a class="white-color" href="#">Don’t Miss Our Furniture, Lighting &
                                    Decorative
                                    Piece Discount {{--  70% Special Offer - <strong class="f-800">‘NEW01’</strong></a></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offer heading end -->

        <!-- Top Featured Area  -->
        <div class="top__featured--area pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2">
                        <div class="top__featured--title">
                            <span class="dusty__gray-color text-uppercase">Top Featured</span>
                            <h3 class="pure__black-color mb-120"><span class="f-300">Discover Top</span> <span
                                    class="f-800">Categories</span></h3>
                            <a class="grenadier-color" href="#"></a>
                        </div>
                    </div>
                    <div class="col-xl-10">
                        <div class="categories-active row position-relative">
                            @foreach ($catagories as $catagorylist)
                                <div class="single-categories col-sm-12">
                                    <div class="categories-box position-relative">
                                        <div class="categories-thumb">
                                            <a
                                                href="{{ route('FilterCatagories') }}?cata={{ $catagorylist['catagory_name'] }}"><img
                                                    class="img"
                                                    src="{{ $catagorylist->catagory_image ? asset('storage/' . $catagorylist->catagory_image) : asset('img/error/no-image.jpg') }}"
                                                    alt=""></a>
                                            <h6 class="f-800 pure__black-color cate-title"><a
                                                    href="{{ route('FilterCatagories') }}?cata={{ $catagorylist['catagory_name'] }}">{{ $catagorylist['catagory_name'] }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Featured Area end -->

        <!-- Weekly Deals -->
        <div class="offer-deals">
            <div class="offer--deals__main offer-deals--bg pt-75 pb-45"
                @foreach ($is_deal as $deal)
                @if ($now < $deal->deal_target) 
                data-background="{{ asset('storage/' . $setting->deals_background) }}"
                @else
                {{-- nothing --}}
                @endif @endforeach>
                <!--img/shop/bg/offer__deals__bg.png -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="offer--deals__tabs">
                                <div class="tab-content" id="myTabContent">
                                    @foreach ($is_deal as $deal)
                                        @php $product = \App\Models\Shop\Product::where('id','=',$deal->id)->get() @endphp
                                        @foreach ($product as $products)
                                            @if ($now < $deal->deal_target)
                                                <div class="@if ($deal['deal_index'] == 1) tab-pane fade show active @else tab-pane fade @endif"
                                                    data-id="" id="{{ $deal['id'] }}" role="tabpanel"
                                                    aria-labelledby="{{ $deal['id'] }}">
                                                    <div class="row align-items-center">
                                                        <div class="col-xl-4 col-lg-4">
                                                            <div class="offer--deals__title mb-30">
                                                                <h2>Limited <span
                                                                        class="f-800 pure__black-color d-block">{{ $products->deal_name }}</span>
                                                                </h2>
                                                                <p>Hurry Up Before Offer Will End</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-2">
                                                            <div class="offer--deals__products mb-30">
                                                                <div class="product__thumb">
                                                                    <a href="{{ route('product_details') }}?pro={{ $deal->id }}"
                                                                        class="img-wrapper">
                                                                        <img class="img"
                                                                            src="{{ $products->main_image ? asset('storage/' . $products->main_image) : asset('img/error/no-image.jpg') }}"
                                                                            alt="" width="125" height="110">
                                                                        {{-- <img class="img secondary-img" src="img/shop/allproducts/products__thumb__02.jpg" alt=""> --}}
                                                                    </a>
                                                                </div>
                                                                <div class="ratings mb-10">
                                                                    @php
                                                                        $get_reviews = \App\Models\Shop\Reviews::where('product_id', $products->id)->avg('rated');
                                                                        $avg = intval($get_reviews);
                                                                    @endphp
                                                                    @if ($get_reviews == null)
                                                                        <ul class="list-inline">
                                                                            <li class="rating-active" value="1"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="2"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="3"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="4"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="5"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                        </ul>
                                                                    @elseif($avg == 1)
                                                                        <ul class="list-inline">
                                                                            <li class="rating-active" value="1"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li value="2" name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li value="3" name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li value="4" name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li value="5" name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                        </ul>
                                                                    @elseif($avg == 2)
                                                                        <ul class="list-inline">
                                                                            <li class="rating-active" value="1"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="2"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li value="3" name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li value="4" name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li value="5" name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                        </ul>
                                                                    @elseif($avg == 3)
                                                                        <ul class="list-inline">
                                                                            <li class="rating-active" value="1"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="2"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="3"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li value="4" name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li value="5" name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                        </ul>
                                                                    @elseif($avg == 4)
                                                                        <ul class="list-inline">
                                                                            <li class="rating-active" value="1"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="2"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="3"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="4"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li value="5" name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                        </ul>
                                                                    @elseif($avg == 5)
                                                                        <ul class="list-inline">
                                                                            <li class="rating-active" value="1"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="2"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="3"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="4"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                            <li class="rating-active" value="5"
                                                                                name="product_rating"><i
                                                                                    class="fas fa-star"></i></li>
                                                                        </ul>
                                                                    @endif
                                                                </div>
                                                                <div class="products--deals__content mb-35">
                                                                    <h6 class="f-700 mb-20"><a
                                                                            href="{{ route('product_details') }}?pro_deal={{ $products->id }}">{{ $deal['product_name'] }}</a>
                                                                    </h6>
                                                                    <span class="price-old">
                                                                        @if ($deal->deal_price != null)
                                                                            {{ $setting->currency }}{{ $deal['deal_price'] }}
                                                                        @endif
                                                                    </span>
                                                                    @php
                                                                        $str = $products->deal_target;
                                                                        $date = DateTime::createFromFormat('Y-m-d', $str);
                                                                        $date_converted = $date->format('Y/m/d'); // => 2013/12/24
                                                                    @endphp
                                                                    <span class="price-new f-600 grenadier-color">
                                                                        {{ $setting->currency }}&nbsp;{{ number_format($deal->product_logical_price, 2) }}
                                                                    </span>
                                                                </div>
                                                                <div class="product-countdown mb-15">
                                                                    <div class="time-count-deal">
                                                                        <div class="countdown-list"
                                                                            data-countdown="{{ $date_converted }}"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="product--footer__deals">
                                                                    <a class="add-link f-700"
                                                                        href="{{ route('add_to_cart', $products->id) }}">+
                                                                        Add To Cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                {{-- nothing --}}
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offer--deals__menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="deals--nav__menu">
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                    @foreach ($is_deal as $deal_tab)
                                        @if ($now < $deal_tab->deal_target)
                                            <li class="nav-item">
                                                <a class="@if ($deal_tab['deal_index'] == 1) nav-link active @else nav-link @endif"
                                                    id="{{ $deal_tab['id'] }}-tab" data-toggle="tab"
                                                    href="#{{ $deal_tab['id'] }}" role="tab"
                                                    aria-controls="{{ $deal_tab['product_catagories'] }}"
                                                    aria-selected="@if ($deal_tab->deal_index == 1) true @else false @endif">{{ $deal_tab['product_brand'] }}</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Microwave Ovens</a>
                                            </li> --}}
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Weekly Deals end -->

        <!-- Product  -->
        <div class="product pt-60 fix">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-6">
                        <div class="product-section mb-30">
                            <h6 class="product--section__title f-800 white-color grenadier-bg">Featured Items</h6>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="all__product--link text-right mb-30">
                            <a class="all-link" href="FilterCatagories?all=feature">Discover All Products<span
                                    class="lnr lnr-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="product__active owl-carousel mb-20">

                            @foreach ($feature as $feature_pro)

                                <div class="product__single product_data">
                                    <div class="product__box">
                                        <div class="product__thumb">
                                            <a href="{{ route('product_details') }}?pro={{ $feature_pro->id }}"
                                                class="img-wrapper">
                                                <img class="img"
                                                    src="{{ $feature_pro->main_image ? asset('storage/' . $feature_pro->main_image) : asset('img/error/no-image.jpg') }}"
                                                    alt="">
                                                <img class="img secondary-img"
                                                    src="{{ $feature_pro->main_image ? asset('storage/' . $feature_pro->big_image) : asset('img/error/no-image.jpg') }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="product__content--top">
                                            <span class="cate-name">{{ $feature_pro->product_catagories }}</span>
                                            <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                    href="{{ route('product_details') }}?pro={{ $feature_pro->id }}">{{ $feature_pro->product_name }}</a>
                                            </h6>
                                            {{-- <input type="text" class="pro_id" id="pro_id" value="{{$feature_pro->id}}" hidden> --}}
                                        </div>
                                        <div class="product__content--rating d-flex justify-content-between">
                                            <div class="rating">
                                                @php
                                                    $get_reviews = \App\Models\Shop\Reviews::where('product_id', $feature_pro->id)->avg('rated');
                                                    $avg = intval($get_reviews);
                                                @endphp
                                                @if ($get_reviews == null)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @elseif($avg == 1)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @elseif($avg == 2)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @elseif($avg == 3)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @elseif($avg == 4)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @elseif($avg == 5)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @endif
                                            </div>
                                            <div class="price">
                                                <h5 class="grenadier-color f-600">
                                                    {{ $setting->currency }}&nbsp;{{ number_format($feature_pro->product_logical_price, 2) }}
                                                </h5>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="product-action">
                                        @if (Auth::check())
                                            @if (\App\Models\Shop\Whishlist::where('product_id', $feature_pro->id)->where('user_id', Auth::id())->exists())
                                                @foreach ($whishlist as $whishlists)
                                                    @if ($whishlists->product_id == $feature_pro->id)
                                                        <a href="#"><span class="fa fa-heart"
                                                                style="color: #ff2600;"></span></a>
                                                        <a href="#"><span class="lnr lnr-eye"></span></a>
                                                        <a href="{{ route('add_to_cart', $feature_pro->id) }}"><span
                                                                class="lnr lnr-cart"></span></a>
                                                    @endif
                                                @endforeach
                                            @elseif(\App\Models\Shop\Whishlist::where('product_id', $feature_pro->id)->where('user_id', Auth::id())->doesntExist())
                                                <a
                                                    href="{{ route('customers.whishList') }}?pro_whish={{ $feature_pro->id }}"><span
                                                        class="lnr lnr-heart"></span></a>
                                                <a href="#"><span class="lnr lnr-eye"></span></a>
                                                <a href="{{ route('add_to_cart', $feature_pro->id) }}"><span
                                                        class="lnr lnr-cart"></span></a>
                                                {{-- <a href="#"><span class="lnr lnr-sync"></span></a> --}}
                                            @endif
                                        @else
                                            <a
                                                href="{{ route('customers.whishList') }}?pro_whish={{ $feature_pro->id }}"><span
                                                    class="lnr lnr-heart"></span></a>
                                            <a href="#"><span class="lnr lnr-eye"></span></a>
                                            <a href="{{ route('add_to_cart', $feature_pro->id) }}"><span
                                                    class="lnr lnr-cart"></span></a>
                                        @endif
                                    </div>

                                </div>

                            @endforeach

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="offer-banner offer--banner__bg mb-30"
                            data-background="img/shop/offer/offer__thumb__3.jpg">
                            <div class="offer--banner__text">
                                <span class="f-200 white-color">@php echo $setting->feature_left_des; @endphp</span>
                                {{-- <h4 class="white-color f-900 mb-40"></h4> --}}
                                @if ($setting->feature_left_target == null)
                                    <a href="#">View Collection<i class="icofont-long-arrow-right"></i></a>
                                @else
                                    <a href="{{ route('FilterCatagories') }}?cata={{ $setting['feature_left_target'] }}">View
                                        Collection<i class="icofont-long-arrow-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="offer-banner offer--banner__bg mb-30"
                            data-background="img/shop/offer/offer__thumb__4.jpg">
                            <div class="offer--banner__text">
                                <span class="f-200 white-color">@php echo $setting->feature_right_des; @endphp</span>
                                {{-- <h4 class="white-color f-900 mb-40"></h4> --}}
                                @if ($setting->feature_right_target == null)
                                    <a href="#">View Collection<i class="icofont-long-arrow-right"></i></a>
                                @else
                                    <a
                                        href="{{ route('FilterCatagories') }}?cata={{ $setting['feature_right_target'] }}">View
                                        Collection<i class="icofont-long-arrow-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product end -->

        <!-- Product  -->
        <div class="product pt-50 feature-h-one">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-9 col-sm-6">
                        <div class="product-section mb-30">
                            <h6 class="product--section__title f-800 white-color grenadier-bg">Featured Items</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="all__product--link text-right mb-30">
                            <a class="all-link" href="FilterCatagories?all=feature">Discover All Products<span
                                    class="lnr lnr-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($feature as $features)
                        <div class="col-lg-4 col-md-6">
                            <div class="product__single mb-30">
                                <div class="product__box featured__box--item">
                                    <div class="product__thumb">
                                        <a href="{{ route('product_details') }}?pro={{ $features->id }}"><img
                                                class="img"
                                                src="{{ $features->main_image ? asset('storage/' . $features->main_image) : asset('img/error/no-image.jpg') }}"
                                                alt="{{ $features->product_name }}"></a>
                                    </div>
                                    <div class="product--flex__right">
                                        <div class="product__content--top">
                                            <span class="cate-name">{{ $features->product_catagories }}</span>
                                            <h6 class="product__title mine__shaft-color f-700 mb-30"><a
                                                    href="{{ route('product_details') }}?pro={{ $features->id }}">
                                                    {{ $features->product_name }}</a></h6>
                                        </div>
                                        <div class="product__content--rating d-flex justify-content-between">
                                            <div class="rating">
                                                @php
                                                    $get_reviews = \App\Models\Shop\Reviews::where('product_id', $features->id)->avg('rated');
                                                    $avg = intval($get_reviews);
                                                @endphp
                                                @if ($get_reviews == null)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @elseif($avg == 1)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @elseif($avg == 2)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @elseif($avg == 3)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @elseif($avg == 4)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @elseif($avg == 5)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="2" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="3" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="4" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                        <li class="rating-active" value="5" name="product_rating"><i
                                                                class="fas fa-star"></i></li>
                                                    </ul>
                                                @endif
                                            </div>
                                            <div class="price">
                                                <h5 class="grenadier-color f-600">
                                                    {{ $setting->currency }}&nbsp;{{ number_format($features->product_logical_price, 2) }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-sm-12">
                        <div class="offer-banner offer--banner__bg bg-one mb-30 mt-25">
                            <a href="#">
                                <img src="{{ $setting->big_banner_feature ? asset('storage/' . $setting->big_banner_feature) : asset('img/error/no-image.jpg') }}"
                                    class="img-fluid" alt="">
                                <div class="offer--banner__text text-one">
                                    <h4 class="f-800 white-color mb-0">End Season Sale</h4>
                                    <h2 class="white-color f-200 mb-0">Wooden Furniture</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product end -->

        <!-- Product  -->
        <div class="product pt-50 pb-40">
            <div class="container">
                @foreach ($feature_catagory as $catagory)
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-9 col-sm-6">
                            <div class="product-section mb-20">
                                <h6 class="product--section__title f-800 white-color grenadier-bg">Featured Items
                                </h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="all__product--link text-right mb-20">
                                <a class="all-link" href="FilterCatagories?all=feature">Discover All Products<span
                                        class="lnr lnr-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-xl-3 d-none d-xl-block">
                            <div class="small__banner mb-30">
                                <div class="small__banner--thumb position-relative">
                                    <a href="#"><img
                                            src="{{ $catagory->ad_banner ? asset('storage/' . $catagory->ad_banner) : asset('img/error/no-image.jpg') }}"
                                            alt=""></a>
                                    <div class="small__banner--content text-center">
                                        <span class="f-300 white-color">Table Lamp</span>
                                        <h2 class="f-800 white-color">60% Flate</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <div class="product__active--small owl-carousel mb-30">
                                @php $fetch_products = \App\Models\Shop\Product::where('product_catagories','=',$catagory->catagory_name)->get(); @endphp
                                @foreach ($fetch_products as $products)
                                    <div class="product__single">
                                        <div class="product__box">
                                            <div class="product__thumb">
                                                <a href="{{ route('product_details') }}?pro={{ $products->id }}"
                                                    class="img-wrapper">
                                                    <img class="img"
                                                        src="{{ $products->main_image ? asset('storage/' . $products->main_image) : asset('img/error/no-image.jpg') }}"
                                                        alt="">
                                                    <img class="img secondary-img"
                                                        src="{{ $products->big_image ? asset('storage/' . $products->big_image) : asset('img/error/no-image.jpg') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="product__content--top">
                                                <span class="cate-name">{{ $products->product_catagories }}</span>
                                                <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                        href="{{ route('product_details') }}?pro={{ $products->id }}">
                                                        {{ $products->product_name }}
                                                    </a></h6>
                                            </div>
                                            <div class="product__content--rating d-flex justify-content-between">
                                                <div class="rating">
                                                    @php
                                                        $get_reviews = \App\Models\Shop\Reviews::where('product_id', $products->id)->avg('rated');
                                                        $avg = intval($get_reviews);
                                                    @endphp
                                                    @if ($get_reviews == null)
                                                        <ul class="list-inline">
                                                            <li class="rating-active" value="1"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="2"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="3"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="4"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="5"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    @elseif($avg == 1)
                                                        <ul class="list-inline">
                                                            <li class="rating-active" value="1"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li value="2" name="product_rating"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li value="3" name="product_rating"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li value="4" name="product_rating"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li value="5" name="product_rating"><i
                                                                    class="fas fa-star"></i></li>
                                                        </ul>
                                                    @elseif($avg == 2)
                                                        <ul class="list-inline">
                                                            <li class="rating-active" value="1"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="2"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li value="3" name="product_rating"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li value="4" name="product_rating"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li value="5" name="product_rating"><i
                                                                    class="fas fa-star"></i></li>
                                                        </ul>
                                                    @elseif($avg == 3)
                                                        <ul class="list-inline">
                                                            <li class="rating-active" value="1"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="2"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="3"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li value="4" name="product_rating"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li value="5" name="product_rating"><i
                                                                    class="fas fa-star"></i></li>
                                                        </ul>
                                                    @elseif($avg == 4)
                                                        <ul class="list-inline">
                                                            <li class="rating-active" value="1"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="2"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="3"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="4"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li value="5" name="product_rating"><i
                                                                    class="fas fa-star"></i></li>
                                                        </ul>
                                                    @elseif($avg == 5)
                                                        <ul class="list-inline">
                                                            <li class="rating-active" value="1"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="2"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="3"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="4"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                            <li class="rating-active" value="5"
                                                                name="product_rating"><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    @endif
                                                </div>
                                                <div class="price">
                                                    <h5 class="grenadier-color f-600">
                                                        {{ $setting->currency }}&nbsp;{{ number_format($products->product_logical_price, 2) }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-action">
                                            <a href="#"><span class="lnr lnr-heart"></span></a>
                                            <a href="#"><span class="lnr lnr-eye"></span></a>
                                            <a href="#"><span class="lnr lnr-cart"></span></a>
                                            <a href="#"><span class="lnr lnr-sync"></span></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Product end -->


        <!-- Brand -->
        <div class="brand">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="brand-active">
                            <div class="single-brand">
                                <img src="img/shop/brand/brand-logo1.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="img/shop/brand/brand-logo2.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="img/shop/brand/brand-logo3.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="img/shop/brand/brand-logo4.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="img/shop/brand/brand-logo5.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="img/shop/brand/brand-logo2.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="img/shop/brand/brand-logo1.png" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Subscribe -->
        <div class="subscribe subscribe--area grenadier-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="newsletter newsletter--box d-flex justify-content-between align-items-center pos-rel">
                            <div class="left d-flex justify-content-between align-items-center">
                                <div class="newsletter__title">
                                    <span class="notification--icon"><img src="img/shop/icon/notification-icon.png"
                                            alt="notification"></span>
                                    <span class="notification__title--heading f-800 white-color">Subscribe for Join
                                        Us!</span>
                                </div>
                                <div class="newsletter--message d-none d-xl-block">
                                    {{-- <p class="newsletter__message__title mb-0">.... & receive $20 coupne for first Shopping &
                                        free delivery.</p> --}}
                                </div>
                            </div>
                            <form class="right newsletter--form pos-rel">
                                <input class="newsletter--input" type="text"
                                    placeholder="Enter Your Email Address ...">
                                <button class="btn newsletter--button" type="button"><img
                                        src="img/shop/icon/plan-icon.png" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe End -->

        <!-- modal area start --
                                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                                                            Launch demo modal
                                                                                        </button>

                                                                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <span aria-hidden="true">&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                       <div class="modal-wrapper">
                                                                                                           <div class="pro-img">
                                                                                                               <img src="img/shop/allproducts/modal-img.jpg" data-zoom-image="img/shop/allproducts/demo.jpg" class="zoom-e-img" alt="">
                                                                                                           </div>
                                                                                                           <div class="pro-text">
                                                                                                               <h4>-30% on Subscribe</h4>
                                                                                                               <p>Five things you only know if you were at Chanel
                                                                                                                   Hamburg Show Kering Reinforces Luxury Status
                                                                                                                   By Distributing Puma.</p>
                                                                                                                <form action="#">
                                                                                                                    <input type="email" placeholder="Enter your Email">
                                                                                                                    <button type="submit">Submit</button>
                                                                                                                    <span>
                                                                                                                        <input type="checkbox">
                                                                                                                        Prevent this pop-up
                                                                                                                    </span>
                                                                                                                </form>
                                                                                                           </div>
                                                                                                       </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        -- modal area end -->

    </main>
    <!-- Main End -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("#add_to_wishlist").click(function(e) {
            e.preventDefault();
            // var ele = $(this);
            // var pro_whish = $('.product_id').val();
            // var pro_whish = $(this).closest('.product_data').find('.product_id').val();
            var pro_whish = product;
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            alert(pro_whish);
            // if(confirm("Are you sure")) {
            //     $.ajax({
            //         url: '{{ route('customers.whishList') }}',
            //         method: "GET",
            //         data: {
            //             _token: '{{ csrf_token() }}',
            //             pro_wish: pro_whish

            //         },
            //         success: function (response) {
            //         //  location.reload(); // reload page after removing item from the cart successfully
            //         }
            //     })
            // }
        });
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"> </script>
<script type="text/javascript">
    $(document).ready(function () {
    $('#add_to_wishlist').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this)
            .closest('.product__box')
            .find('.product_id')
            .val();
        alert(product_id);
        // $.ajax({
        //     method: "POST",
        //     url: "/customers/wishList",
        //     data: {
        //         product_id: product_id,
        //     },
        //     success: function (response) {
        //         alertify.set("notifier", "position", "top-right");
        //         alertify.success(response.message);
        //     },
        // });
    });
});
</script> --}}
@show
