@section('product_deatails')
    @php
        $total = 0;
        foreach ((array) session('cart') as $id => $details) {
            $total += $details['quantity'] * $details['price'];
        }
    @endphp
    <!-- Main -->
    <main class="main--wrapper">
        @foreach ($products as $product)
            <!-- Shop-details start -->
            <section class="shop-details-area pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="shop-bred pt-35 pb-35">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('FilterCatagories') }}?cata={{ $product['product_catagories'] }}">{{ $product['product_catagories'] }}</a>
                                        </li>
                                        {{-- <li class="breadcrumb-item"><a href="index-3.html">Headphone</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page"><a
                                                href="{{ route('product_details') }}?pro={{ $product->id }}">
                                                {{ $product['product_name'] }}</li></a>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6 order-1 order-lg-1">
                            <div class="pro-img">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home5" role="tabpanel"
                                        aria-labelledby="home-tab5"><img
                                            src="{{ $product->big_image ? asset('storage/' . $product->big_image) : asset('img/error/no-image.jpg') }}"
                                            class="img-fluid" alt=""></div>

                                    <div class="tab-pane fade" id="profile5" role="tabpanel"
                                        aria-labelledby="profile-tab5">
                                        <img src="{{ $product->big_image1 ? asset('storage/' . $product->big_image1) : asset('img/error/no-image.jpg') }}"
                                            class="img-fluid" alt="">
                                    </div>

                                    <div class="tab-pane fade" id="contact5" role="tabpanel"
                                        aria-labelledby="contact-tab5">
                                        <img src="{{ $product->big_image2 ? asset('storage/' . $product->big_image2) : asset('img/error/no-image.jpg') }}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                                <ul class="nav" id="myTab1" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab5" data-toggle="tab" href="#home5"
                                            role="tab" aria-controls="home5" aria-selected="true">
                                            <img src="{{ $product->big_image ? asset('storage/' . $product->big_image) : asset('img/error/no-image.jpg') }}"
                                                width="110" height="110" class="img-fluid" alt="">
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5"
                                            role="tab" aria-controls="profile5" aria-selected="false">
                                            <img src="{{ $product->big_image1 ? asset('storage/' . $product->big_image1) : asset('img/error/no-image.jpg') }}"
                                                width="110" height="110" class="img-fluid" alt="">
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5"
                                            role="tab" aria-controls="contact5" aria-selected="false">
                                            <img src="{{ $product->big_image2 ? asset('storage/' . $product->big_image2) : asset('img/error/no-image.jpg') }}"
                                                width="110" height="110" class="img-fluid" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 order-3 order-lg-2">
                            <div class="pro-content">
                                <span>{{ $product->product_catagories }}</span>
                                <h5 class="title">{{ $product->product_name }}</h5>
                                <div class="pro-rating pb-40">
                                    @php
                                        $get_reviews_all = \App\Models\Shop\Reviews::where('product_id', $product->id)->get();
                                        $get_reviews = \App\Models\Shop\Reviews::where('product_id', $product->id)->avg('rated');
                                        $reviews_comment = \App\Models\Shop\Reviews::where('product_id', $product->id)
                                            ->Latest()
                                            ->get()
                                            ->take(5);
                                        $avg = intval($get_reviews);
                                    @endphp
                                    @if ($get_reviews == null)
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                    @elseif($avg == 1)
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    @elseif($avg == 2)
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    @elseif($avg == 3)
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    @elseif($avg == 4)
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    @elseif($avg == 5)
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                        <a href="#" class="active"><i class="fas fa-star"></i></a>
                                    @endif
                                    <a href="#" class="review">( {{ count($get_reviews_all) }} customer
                                        reviews)</a>
                                </div>
                                <div class="pro-social mb-45">
                                    <a href="#"><img src="img/shop/payment/pro-details-social.jpg"
                                            class="img-fluid" alt=""></a>
                                </div>
                                <div class="about-pro">
                                    @php echo $product->product_description; @endphp
                                </div>
                                <div class="pro-code pt-25">
                                    <ul>
                                        {{-- <li>SKU: <span>FW511948218</span></li> --}}
                                        <li>Tag: <span>{{ $product->product_brand }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 order-2 order-lg-3">
                            <div class="cart-wrapper">
                                <div class="cart-title">
                                    <h6>Availability: <span>{{ $product->product_available }}</span></h6>
                                </div>
                                <div class="price mt-15 mb-20">
                                    @if ($product->plan_id != null)
                                        <span>
                                            <del>
                                                {{ $setting->currency }}&nbsp;{{ number_format($product->product_price, 2) }}
                                            </del>
                                        </span>
                                        <h1>
                                            {{ $setting->currency }}&nbsp;{{ number_format($product->product_logical_price, 2) }}
                                        </h1>
                                    @else
                                        <h1>
                                            {{ $setting->currency }}&nbsp;{{ number_format($product->product_logical_price, 2) }}
                                        </h1>
                                    @endif
                                </div>
                                {{-- <div class="field">
                                    <label>Color:</label>
                                    <select name="select">
                                        <option value="1">Rose Gold</option>
                                        <option value="2">Red Gold</option>
                                        <option value="3">Yellow Gold</option>
                                        <option value="4">Blue Gold</option>
                                        <option value="5">Gray Gold</option>
                                    </select>
                                </div> --}}

                                <a href="{{ route('add_to_cart', $product->id) }}" class="cart-button">Add To Cart</a>
                                {{-- <a href="#" class="cart-button color-black" name="pay" onclick="document.getElementById('form1').submit();">Buy now</a> --}}
                                {{-- <input type="submit" name="pay" style="color: #cd3301; font-weight: bolder;" title="Buy now" value="Buy now"> --}}

                                <div class="last pt-15">
                                    <a href="{{ route('customers.whishList') }}?pro_whish={{ $product->id }}">Add To
                                        Wishlist</a>
                                    {{-- <a href="#">Compare</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Shop-details end -->

            <!-- Shop-details tab start -->
            <section class="shop-details-desc">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="desc-wrapper">
                                <ul class="nav custom-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="home-tab11" data-toggle="tab" href="#home11"
                                            role="tab" aria-controls="home11" aria-selected="true">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="profile-tab11" data-toggle="tab"
                                            href="#profile11" role="tab" aria-controls="profile11"
                                            aria-selected="false">Description </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab11" data-toggle="tab" href="#contact11"
                                            role="tab" aria-controls="contact11"
                                            aria-selected="false">Reviews({{ count($reviews) }})</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent1">
                                    <div class="tab-pane fade" id="home11" role="tabpanel"
                                        aria-labelledby="home-tab11">
                                        <div class="desc-content mt-60">
                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <div class="spe-wrapper">
                                                        @php echo $product->product_specification; @endphp
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="profile11" role="tabpanel"
                                        aria-labelledby="profile-tab11">
                                        <div class="desc-content mt-60">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="single-content mb-40">
                                                        @php echo $product->product_long_description; @endphp
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact11" role="tabpanel"
                                        aria-labelledby="contact-tab11">
                                        <div class="desc-content mt-60">
                                            <div class="row d-flex justify-content-center">
                                                @unless (count($get_reviews_all) < 0)
                                                    @foreach ($reviews_comment as $review)
                                                        <div class="col-md-8">

                                                            <div class="card p-3 mt-2">

                                                                <div class="d-flex justify-content-between align-items-center">

                                                                    <div class="user d-flex flex-row align-items-center">

                                                                        <img src="https://i.imgur.com/ZSkeqnd.jpg"
                                                                            width="30"
                                                                            class="user-img rounded-circle mr-2">
                                                                        <span><small
                                                                                class="font-weight-bold text-primary">{{ $review->reviewer_user_name }}</small>
                                                                            <small
                                                                                class="font-weight-bold">{{ $review->review }}</small></span>

                                                                    </div>


                                                                    {{-- <small>3 days ago</small> --}}

                                                                </div>

                                                                {{-- 
                                                        <div class="action d-flex justify-content-between mt-2 align-items-center">

                                                            <div class="reply px-4">
                                                                <small>Remove</small>
                                                                <span class="dots"></span>
                                                                <small>Reply</small>
                                                                <span class="dots"></span>
                                                                <small>Translate</small>
                                                            
                                                            </div>

                                                            <div class="icons align-items-center">
                                                            
                                                                <i class="fa fa-check-circle-o check-icon text-primary"></i>
                                                                
                                                            </div>
                                                            
                                                        </div> 
                                                        --}}



                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <h1>No reviews yet. Be the first to review! </h1>
                                                @endunless
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Shop-details tab end -->

            <!-- Product  -->
            <div class="product pt-75 product-h-two">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-sm-12">
                            <div class="section-header">
                                <div class="row align-items-center">
                                    <div class="col-xl-9 col-sm-6">
                                        <div class="product-section2">
                                            <h6 class="product--section__title2"><span>Best Related</span> On Latest Coming
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="all__product--link text-right">
                                            <a class="all-link" href="FilterCatagories?all=all">Discover All Products<span
                                                    class="lnr lnr-arrow-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="product__active owl-carousel">
                                @php
                                    $product = \App\Models\shop\Product::where('product_catagories', $product->product_catagories)->get();
                                @endphp
                                @foreach ($product as $products)
                                    <div class="product__single">
                                        <div class="product__box">
                                            <div class="product__content--top">
                                                <span class="cate-name">{{ $products->product_catagories }}</span>
                                                <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                        href="{{ route('product_details') }}?pro={{ $products->id }}">
                                                        {{ $products->product_name }}
                                                    </a></h6>
                                            </div>
                                            <div class="product__thumb">
                                                <a href="{{ route('product_details') }}?pro={{ $products->id }}"
                                                    class="img-wrapper">
                                                    <img class="img"
                                                        src="{{ $products->main_image ? asset('storage/' . $products->main_image) : asset('img/error/no-image.jpg') }}"
                                                        alt="">
                                                    {{-- <img class="img secondary-img" src="img/allproducts/products__thumb__33.jpg" alt=""> --}}
                                                </a>
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
                                                    <h5 class="grenadier-color f-600">${{ $products->product_price }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-action">
                                            @if (Auth::check())
                                                @if (\App\Models\shop\Whishlist::where('product_id', $products->id)->where('user_id', Auth::id())->exists())
                                                    @foreach ($whishlist as $whishlists)
                                                        @if ($whishlists->product_id == $products->id)
                                                            <a
                                                                href="{{ route('customers.whishList') }}?pro_whish={{ $products->id }}"><span
                                                                    class="fa fa-heart"
                                                                    style="color: #ff2600;"></span></a>
                                                            <a href="#"><span class="lnr lnr-eye"></span></a>
                                                            <a href="{{ route('add_to_cart', $products->id) }}"><span
                                                                    class="lnr lnr-cart"></span></a>
                                                        @endif
                                                    @endforeach
                                                @elseif(\App\Models\shop\Whishlist::where('product_id', $products->id)->where('user_id', Auth::id())->doesntExist())
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
                    </div>
                </div>
            </div>
            <!-- Product end -->

            <!-- Subscribe -->
            <div class="subscribe subscribe--area grenadier-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div
                                class="newsletter newsletter--box d-flex justify-content-between align-items-center pos-rel">
                                <div class="left d-flex justify-content-between align-items-center">
                                    <div class="newsletter__title">
                                        <span class="notification--icon"><img src="img/shop/icon/notification-icon.png"
                                                alt="notification"></span>
                                        <span class="notification__title--heading f-800 white-color">Subscribe for Join
                                            Us!</span>
                                    </div>
                                    {{-- <div class="newsletter--message d-none d-xl-block">
                                        <p class="newsletter__message__title mb-0">.... & receive $20 coupne for first
                                            Shopping &
                                            free delivery.</p>
                                    </div> --}}
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
        @endforeach
    </main>
    <!-- Main End -->
    {{-- <script type="text/javascript">
    $(".cart_update").on('change',function (e) {
    // var quantity = $(this).attr("data-quantity").val();
    e.preventDefault();
    var ele = $(this);

        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "PATCH",
            data: {
                _token: '{{ csrf_token() }}',
                quantity: ele.find(".quantity").val()
            },
            success: function (response) {
            window.location.reload(); // reload page after removing item from the cart successfully
            $('.cart').click();
        }
        })

    });
</script> --}}
@show
