 @section('about')
     <div class="wt-bnr-inr overlay-wraper bg-center" style="background-image:url(frontend/images/banner/3.jpg);">
         <div class="overlay-main site-bg-secondry opacity-09"></div>
         <div class="container">
             <div class="wt-bnr-inr-entry">
                 <div class="banner-title-outer">
                     <div class="banner-title-name">
                         <h2 class="site-text-primary">About Us</h2>
                     </div>
                 </div>
                 <!-- BREADCRUMB ROW -->

                 <div>
                     <ul class="wt-breadcrumb breadcrumb-style-2">
                         <li><a href="/">Home</a></li>
                         <li>About</li>
                     </ul>
                 </div>

                 <!-- BREADCRUMB ROW END -->
             </div>
         </div>
     </div>
     <!-- INNER PAGE BANNER END -->

     <!-- ABOUT SECTION START -->
     <div class="section-full welcome-section-outer">
         <div class="welcome-section-top bg-white p-t80 p-b50">
             <div class="container">
                 <div class="row d-flex justify-content-center">

                     <div class="col-lg-6 col-md-12 m-b30">
                         <div class="welcom-to-section">
                             <!-- TITLE START-->
                             <div class="left wt-small-separator-outer">
                                 <div class="wt-small-separator site-text-primary">
                                     <div class="sep-leaf-left"></div>
                                     <div>Welcome to industro</div>
                                     <div class="sep-leaf-right"></div>
                                 </div>
                             </div>
                             <h2>We Are Here to Increase Your Knowledge With Experience</h2>
                             <!-- TITLE END-->
                             <ul class="site-list-style-one">
                                 <li>Quality Control System , 100% Satisfaction Guarantee</li>
                                 <li>Unrivalled Workmanship, Professional and Qualified</li>
                                 <li>Environmental Sensitivity, Personalised Solutions</li>
                             </ul>

                             <p>Progressively maintain extensive infomediaries via extensible nich. Capitalize on low
                                 hanging fruit. a ballpark value added is activity to beta test. Override the digital divide
                                 with additional click throughs from fruit to identify a ballpark value added.</p>

                             {{-- <div class="welcom-to-section-bottom d-flex justify-content-between">
                                 <div class="welcom-btn-position"><a href="about-2.html"
                                         class="site-button-secondry site-btn-effect">More About</a></div>
                             </div> --}}
                         </div>
                     </div>

                     <div class="col-lg-6 col-md-12 m-b30">
                         <div class="img-colarge2">
                             <div class="colarge-2 slide-right"><img src="frontend/images/colarge/s2.jpg" alt="">
                             </div>
                             <div class="colarge-2-1"><img src="frontend/images/colarge/s1.jpg" alt=""></div>
                             <div class="since-year-outer2">
                                 <div class="since-year2"><span>Since</span><strong>2019</strong></div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
     <!-- ABOUT SECTION  SECTION END -->




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
