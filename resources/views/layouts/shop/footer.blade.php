@section('footer')

    <!-- FOOTER BLOCKES START -->
    <div class="footer-top bg-no-repeat bg-bottom-right"
        style="background-image:url(frontend/images/background/footer-bg.png)">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="footer-h-left">
                        <div class="widget widget_about">
                            <div class="logo-footer clearfix">
                                <a href="/">
                                    <h3 style="color: #ffffff;font-style: oblique;">
                                        {{ $setting->webname }}</h3>
                                </a>
                            </div>
                            <p>Over 5 year experience and knowledge international standards technologicaly
                                changes, we are dedicated to provides the best solutions
                                to our valued customers there are many variation solution we makes long-term
                                investments goal in global companies in different sectors</p>
                        </div>
                        <div class="widget recent-posts-entry">
                            <ul class="widget_address">
                                <li><i class="fa fa-map-marker"></i>{{ $setting->address1 }}
                                </li>
                                <li><i class="fa fa-envelope"></i>{{ $setting->email }}</li>
                                <li> <i class="fa fa-phone"></i>{{ $setting->phone }}</li>
                            </ul>
                        </div>
                        <ul class="social-icons  wt-social-links footer-social-icon">
                            <li><a href="javascript:void(0);" class="fa fa-google"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>

                </div>

                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="row footer-h-right">
                        <div class="col-lg-5 col-md-4">
                            <div class="widget widget_services">
                                <h3 class="widget-title">Useful links</h3>
                                <ul>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('products') }}">Product</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-8">
                            <div class="widget widget_services">
                                <h3 class="widget-title">Our Sectors</h3>
                                <ul>
                                    @foreach ($catagories as $catagory)
                                        <li><a href="s-oilgas.html">{{ $catagory->catagory_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="widget widget_newsletter">
                        <h3 class="widget-title">Newsletter</h3>
                        <p>Subscribe to our newsletter to receive latest news on our services.</p>
                        <div class="newsletter-input">
                            <div class="input-group">
                                <input id="email" type="text" class="form-control" name="email"
                                    placeholder="Enter your email">
                                <div class="input-group-append">
                                    <button type="submit"
                                        class="input-group-text nl-search-btn text-black site-bg-primary title-style-2">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- FOOTER COPYRIGHT -->


    <div class="footer-bottom">
        <div class="container">
            <div class="wt-footer-bot-left d-flex justify-content-between">
                <span class="copyrights-text">Copyright © {{ now()->year }} <span class="site-text-primary">Dagemawi
                        Alemayehu (Et-Systems)</span></span>
                <ul class="copyrights-nav">
                    {{-- <li><a href="javascript:void(0);">Terms &amp; Condition</a></li>
                        <li><a href="javascript:void(0);">Privacy Policy</a></li> --}}
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>

@show
