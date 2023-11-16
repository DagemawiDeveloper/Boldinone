        <!-- page banner area start -->
        <section class="page-banner-area blog-page mt-25" data-background="img/shop/bg/blog-page-banner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="banner-text text-center pt-50 pb-45">
                            <h2 class="f-800 cod__black-color">Shop Products</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Filter</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page banner area end -->
        <!-- shop cat area start -->
        <div class="top__featured--area feature-h-one pt-65 pb-80">
            <div class="container">
                <div class="row mb-10">
                    <div class="col-sm-3 col-4">
                        <div class="cat-bar">
                            <div class="icon">
                                <a href="#"><i class="fas fa-bars"></i></a>
                            </div>
                            <span class="f-800 ">Filter</span>
                        </div>
                    </div>
                    <div class="col-sm-9 col-8">
                        <div class="shop-cat">
                            <div class="show-text d-none d-sm-block">
                                {{-- <span class="f-400"> {{$count_catagory}} results</span> --}}
                            </div>
                            <div class="select-text">
                                <select id="sortBy">
                                    <option value="productLatest">Sort By Latest</option>
                                    <option value="priceAsc">Price - Higher To Lower</option>
                                    <option value="priceDesc">Price - Lower To Higher</option>
                                    {{-- <option value="titleAsc">Short By 03 </option> --}}
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product__single mb-30">
                                <div class="product__box featured__box--item">
                                    <div class="product__thumb">
                                        <a href="{{ route('product_details') }}?pro={{ $product->id }}"><img
                                                class="img"
                                                src="{{ $product->main_image ? asset('storage/' . $product->main_image) : asset('img/error/no-image.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="product--flex__right">
                                        <div class="product__content--top">
                                            <span class="cate-name">{{ $product->product_brand }}</span>
                                            <h6 class="product__title mine__shaft-color f-700 mb-30"><a
                                                    href="{{ route('product_details') }}?pro={{ $product->id }}">
                                                    {{ $product->product_name }}
                                                </a></h6>
                                        </div>
                                        <div class="product__content--rating d-flex justify-content-between">
                                            <div class="rating">
                                                @php
                                                    $get_reviews = \App\Models\Shop\Reviews::where('product_id', $product->id)->avg('rated');
                                                    $avg = intval($get_reviews);
                                                @endphp
                                                @if ($get_reviews == null)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating">
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                        <li class="rating-active" value="2" name="product_rating">
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                        <li class="rating-active" value="3" name="product_rating">
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                        <li class="rating-active" value="4" name="product_rating">
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                        <li class="rating-active" value="5" name="product_rating">
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                    </ul>
                                                @elseif($avg == 1)
                                                    <ul class="list-inline">
                                                        <li class="rating-active" value="1" name="product_rating">
                                                            <i class="fas fa-star"></i>
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
                                                        <li class="rating-active" value="1" name="product_rating">
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                        <li class="rating-active" value="2" name="product_rating">
                                                            <i class="fas fa-star"></i>
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
                                                    {{ $setting->currency }}&nbsp;{{ number_format($product->product_logical_price, 2) }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="new">{{ $product->product_brand }}</span>
                                    @if ($product->product_discount != null)
                                        <span class="sale">{{ $product->product_discount }}% OFF</span>
                                    @else
                                        <span class="sale">sale</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="row mt-20">
                    <div class="col-sm-12">
                        <div class="common-pagination">
                            {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i> Prev</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next <i class="fas fa-angle-right"></i></a></li>
                                </ul>
                            </nav> --}}
                            <div class="ajax-load text-center" style="display: none">
                                <img src="img/loading.gif">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop cat area end -->
