@section('top_header')
    <!-- HEADER START -->
    <header class="site-header header-style-2 mobile-sider-drawer-menu">

        <div class="top-bar site-bg-secondry">
            <div class="container">

                <div class="d-flex justify-content-between">
                    <div class="wt-topbar-left d-flex flex-wrap align-content-start">
                        <ul class="wt-topbar-info e-p-bx text-white">
                            <li><span> Monday - Saturday</span><span>8AM -7PM</span></li>
                        </ul>
                    </div>

                    <div class="wt-topbar-right d-flex flex-wrap align-content-center">
                        <ul class="wt-topbar-info-2 e-p-bx text-white">
                            <li><i class="fa fa-phone"></i>{{ $setting->phone }}</li>
                            <li><i class="fa fa-envelope"></i>{{ $setting->email }}</li>
                        </ul>

                        <ul class="social-icons">
                            <li><a href="javascript:void(0);" class="fa fa-google"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

        <div class="sticky-header main-bar-wraper  navbar-expand-lg">
            <div class="main-bar">
                <div class="container clearfix">

                    <div class="logo-header">
                        <div class="logo-header-inner logo-header-one">
                            <a href="index-2.html">
                                {{-- <img src="frontend/images/logo-9.png" alt="" /> --}}
                                <h3 style="color: #00173c;font-style: oblique;font-size: larger;">
                                    {{ $setting->webname }}</h3>
                            </a>
                        </div>
                    </div>

                    <!-- NAV Toggle Button -->
                    <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button"
                        class="navbar-toggler collapsed">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar icon-bar-first"></span>
                        <span class="icon-bar icon-bar-two"></span>
                        <span class="icon-bar icon-bar-three"></span>
                    </button>

                    <div class="extra-nav header-2-nav">
                        <div class="extra-cell">
                            {{-- <div class="header-search">
                                <a href="javascript:void(0);" class="header-search-icon"><i class="fa fa-search"></i></a>
                            </div> --}}
                            <div class="header-nav-request">
                                <a href="#" class="contact-slide-show">Request a Quote <i
                                        class="fa fa-angle-right"></i></a>
                            </div>

                        </div>

                    </div>


                    <!-- MAIN Vav -->
                    <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-center">

                        <ul class=" nav navbar-nav">
                            <li> <a href="/">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li> <a href="{{ route('products') }}">Product</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>

                        </ul>

                    </div>

                    {{-- <!-- SITE Search -->
                    <div id="search-toggle-block">
                        <div id="search">
                            <form role="search" id="searchform" action="" method="get"
                                class="radius-xl">
                                <div class="input-group">
                                    <input class="form-control" value="" name="q" type="search"
                                        placeholder="Type to search" />
                                    <span class="input-group-append"><button type="button" class="search-btn"><i
                                                class="fa fa-search"></i></button></span>
                                </div>
                            </form>
                        </div>
                    </div> --}}

                </div>
            </div>

        </div>
<!-- Pixel Code for https://app.socialproofy.io/ -->
<script async src="https://app.socialproofy.io/pixel/kw7jfppxpbcyycfj0wf95gztujub2ww4"></script>
<!-- END Pixel Code -->
    </header>
    <!-- HEADER END -->
@show
