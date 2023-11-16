@section('about')
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper bg-center" style="background-image:url(frontend/images/banner/5.jpg);">
        <div class="overlay-main site-bg-secondry opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h2 class="site-text-primary">Contact Us</h2>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2">
                        <li><a href="/">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->


    <!-- SECTION CONTENTG START -->

    <!-- CONTACT FORM -->
    <div class="section-full  p-t80 p-b50 bg-cover" style="background-image:url(frontend/images/background/bg-7.jpg)">
        <div class="section-content">
            <div class="container">
                <div class="contact-one">
                    <!-- CONTACT FORM-->
                    <div class="row  d-flex justify-content-center flex-wrap">

                        <div class="col-lg-6 col-md-6 m-b30">
                            <form class="cons-contact-form" method="post" action="">
                                <!-- TITLE START -->
                                <div class="section-head left wt-small-separator-outer">
                                    <div class="wt-small-separator site-text-primary">
                                        <div class="sep-leaf-left"></div>
                                        <div>Contact Form</div>
                                        <div class="sep-leaf-right"></div>
                                    </div>
                                    <h2>Get In Touch</h2>
                                </div>
                                <!-- TITLE END -->

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input name="username" type="text" required class="form-control"
                                                placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input name="email" type="text" class="form-control" required
                                                placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input name="phone" type="text" class="form-control" required
                                                placeholder="Phone">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input name="subject" type="text" class="form-control" required
                                                placeholder="Subject">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" rows="4" placeholder="Message"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="site-button site-btn-effect">Submit Now</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="col-lg-6 col-md-6 m-b30">
                            <div class="contact-info">
                                <div class="contact-info-inner">

                                    <!-- TITLE START-->
                                    <div class="section-head left wt-small-separator-outer">
                                        <div class="wt-small-separator site-text-primary">
                                            <div class="sep-leaf-left"></div>
                                            <div>Contact info</div>
                                            <div class="sep-leaf-right"></div>
                                        </div>
                                        <h2>Our Full Info</h2>
                                    </div>
                                    <!-- TITLE END-->

                                    <div class="contact-info-section"
                                        style="background-image:url(frontend/images/background/bg-map2.png);">

                                        <div class="wt-icon-box-wraper left m-b30">

                                            <div class="icon-content">
                                                <h3 class="m-t0 site-text-primary">Phone number</h3>
                                                <p>{{ $setting->phone }}</p>
                                            </div>
                                        </div>

                                        <div class="wt-icon-box-wraper left m-b30">

                                            <div class="icon-content">
                                                <h3 class="m-t0 site-text-primary">Email address</h3>
                                                <p>{{ $setting->email }}</p>
                                            </div>
                                        </div>

                                        <div class="wt-icon-box-wraper left m-b30">

                                            <div class="icon-content">
                                                <h3 class="m-t0 site-text-primary">Address info</h3>
                                                <p>{{ $setting->address1 }}</p>
                                            </div>
                                        </div>

                                        <div class="wt-icon-box-wraper left">

                                            <div class="icon-content">
                                                <h3 class="m-t0 site-text-primary">Opening Hours</h3>
                                                <ul class="list-unstyled m-b0">
                                                    <li>Mon-Fri: 9 am – 6 pm</li>
                                                    <li>Saturday: 9 am – 4 pm</li>
                                                    <li>Sunday: Closed</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- GOOGLE MAP -->
    <div class="section-full bg-white p-tb80">
        <div class="section-content">
            <div class="container">
                {{-- <div class="gmap-outline"> --}}
                {{-- <div id="gmap_canvas2" class="google-map">
                        
                    </div> --}}
            </div>

            <div class="mapouter">
                <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                        marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Ethiopia, Addis Ababa&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                        href="https://embed-googlemap.com">google map embed</a></div>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        width: 100%;
                        height: 400px;
                    }

                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        width: 100%;
                        height: 400px;
                    }

                    .gmap_iframe {
                        height: 400px !important;
                    }
                </style>
            </div>
        </div>
    </div>
    </div>

    </div>
    <!-- CONTENT END -->

    <!-- SELF INTRO SECTION START -->
    <div class="section-full self-intro-section-outer overlay-wraper"
        style="background-image:url(frontend/images/background/bg-6.jpg)">
        <div class="overlay-main site-bg-secondry opacity-09"></div>
        <div class="self-intro-top bg-gray p-t80 p-b50">
            <div class="container">
                <div class="row justify-content-end">

                    <div class="col-lg-6 col-md-12">
                        <!-- TITLE START-->
                        <div class="left wt-small-separator-outer">
                            <div class="wt-small-separator site-text-primary">
                                <div class="sep-leaf-left"></div>
                                <div>Call Us And get it done!</div>
                                <div class="sep-leaf-right"></div>
                            </div>
                            <h2>We Have 5+ Years Industrial Experiences</h2>
                            <p>Dramatically disseminate standardized metrics after resource leveling processes
                                for change for interoperable</p>
                        </div>
                        <!-- TITLE END-->
                    </div>

                </div>
            </div>
        </div>

        <div class="self-intro-bottom p-t80 p-b80">
            <div class="container">
                <div class="row justify-content-end">

                    <div class="col-lg-6 col-md-6">
                        <div class="self-info-detail">

                            <div class="wt-icon-box-wraper p-b10 left">
                                <div class="icon-md m-b20">
                                    <span class="icon-cell site-text-primary"><i class="flaticon-call"></i></span>
                                </div>
                                <div class="icon-content text-white">
                                    <h3 class="wt-tilte">Have a question? call us now</h3>
                                    <p>{{ $setting->phone }}</p>
                                </div>
                            </div>

                            <div class="wt-icon-box-wraper p-b10  left">
                                <div class="icon-md m-b20">
                                    <span class="icon-cell site-text-primary"><i class="flaticon-mail"></i></span>
                                </div>
                                <div class="icon-content text-white">
                                    <h3 class="wt-tilte">Need support? Drop us an Email</h3>
                                    <p>{{ $setting->email }}</p>
                                </div>
                            </div>

                            <div class="wt-icon-box-wraper  left">
                                <div class="icon-md m-b20">
                                    <span class="icon-cell site-text-primary"><i class="flaticon-history"></i></span>
                                </div>
                                <div class="icon-content text-white">
                                    <h3 class="wt-tilte">We are open on</h3>
                                    <p>Mon - Sat 07:00 - 21:00 </p>
                                    <p>Sunday - Closed</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="self-intro-pic-block">
                <div class="wt-media"><img src="frontend/images/self-pic.png" alt=""></div>
            </div>
        </div>

    </div>
    <!-- SELF INTRO SECTION  END -->
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
