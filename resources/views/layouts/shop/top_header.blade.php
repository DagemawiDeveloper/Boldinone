@section('top_header')
    @php
        $siteName = $setting?->webname ?: config('app.name', 'Boldinone');
        $supportPhone = $setting?->phone;
        $supportEmail = $setting?->email;
    @endphp

    <!-- HEADER START -->
    <header class="site-header header-style-2 mobile-sider-drawer-menu">

        <div class="top-bar site-bg-secondry">
            <div class="container">

                <div class="d-flex justify-content-between">
                    <div class="wt-topbar-left d-flex flex-wrap align-content-start">
                        <ul class="wt-topbar-info e-p-bx text-white">
                            <li><span>Monday - Saturday</span><span>8AM - 7PM</span></li>
                        </ul>
                    </div>

                    <div class="wt-topbar-right d-flex flex-wrap align-content-center">
                        @if ($supportPhone || $supportEmail)
                            <ul class="wt-topbar-info-2 e-p-bx text-white">
                                @if ($supportPhone)
                                    <li><i class="fa fa-phone"></i>{{ $supportPhone }}</li>
                                @endif
                                @if ($supportEmail)
                                    <li><i class="fa fa-envelope"></i>{{ $supportEmail }}</li>
                                @endif
                            </ul>
                        @endif

                        <ul class="social-icons">
                            <li><a href="javascript:void(0);" class="fa fa-google" aria-label="Google"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-rss" aria-label="RSS"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-facebook" aria-label="Facebook"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-twitter" aria-label="Twitter"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-linkedin" aria-label="LinkedIn"></a></li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar">
                <div class="container clearfix">

                    <div class="logo-header">
                        <div class="logo-header-inner logo-header-one">
                            <a href="{{ route('shop') }}">
                                <h3 style="color: #00173c;font-style: oblique;font-size: larger;">
                                    {{ $siteName }}
                                </h3>
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
                            <div class="header-nav-request">
                                <a href="{{ route('contact') }}" class="contact-slide-show">Request a Quote <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- MAIN Nav -->
                    <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-center">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('shop') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('products') }}">Product</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <!-- Pixel Code for https://app.socialproofy.io/ -->
        <script async src="https://app.socialproofy.io/pixel/kw7jfppxpbcyycfj0wf95gztujub2ww4"></script>
        <!-- END Pixel Code -->
    </header>
    <!-- HEADER END -->
@show
