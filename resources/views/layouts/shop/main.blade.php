@section('main')

    <!-- SLIDER START -->
    <div class="slider-outer">

        <div id="welcome_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="goodnews-header"
            data-source="gallery" style="background:#eeeeee;padding:0px;">
            <div id="welcome_two" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.3.1">
                <ul>
                    @foreach ($slidelist as $slide)
                        <!-- SLIDE 1 -->
                        <li data-index="rs-901" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="default"
                            data-thumb="{{ $slide->slide_image ? asset('storage/' . $slide->slide_image) : asset('img/error/no-image.jpg') }}"
                            data-rotate="0" data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7"
                            data-saveperformance="off" data-title="Slide Title" data-param1="Additional Text" data-param2=""
                            data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                            data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ $slide->slide_image ? asset('storage/' . $slide->slide_image) : asset('img/error/no-image.jpg') }}"
                                alt=""
                                data-lazyload="{{ $slide->slide_image ? asset('storage/' . $slide->slide_image) : asset('img/error/no-image.jpg') }}"
                                data-bgposition="center center" data-bgfit="cover" data-bgparallax="4" class="rev-slidebg"
                                data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 [ for overlay ] -->
                            <div class="tp-caption tp-shape tp-shapewrapper " id="slide-901-layer-0"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                                data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                                data-frames='[
                                {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                                ]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index: 1;background-color:rgba(0, 0, 0, 0.1);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                            </div>

                            <!-- LAYER NR. 2 [ Black Box ] -->
                            <div class="tp-caption   tp-resizeme site-text-primary" id="slide-901-layer-2"
                                data-x="['left','left','left','left']" data-hoffset="['100','120','34','30']"
                                data-y="['top','top','top','top']" data-voffset="['80','180','180','180']"
                                data-fontsize="['48','48','48','34']" data-lineheight="['48','48','48','48']"
                                data-width="['700','700','96%','96%']" data-height="['none','none','none','none']"
                                data-whitespace="['normal','normal','normal','normal']" data-type="text"
                                data-responsive_offset="on"
                                data-frames='[
                                {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                ]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,4]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,4]"
                                data-paddingleft="[30,30,30,20]"
                                style="z-index: 13; 
                                white-space: normal; 
                                font-weight: 300;
                                font-family: 'Teko', sans-serif; border-left:8px solid #00173c">
                                {{ $slide->catagory }}
                            </div>

                            <!-- LAYER NR. 3 [ for title ] -->
                            <div class="tp-caption   tp-resizeme" id="slide-901-layer-3"
                                data-x="['left','left','left','left']" data-hoffset="[100','120','30','30']"
                                data-y="['top','top','top','top']" data-voffset="['180','280','280','260']"
                                data-fontsize="['120','72','72','38']" data-lineheight="['100','66','48','38']"
                                data-width="['700','700','96%','96%']" data-height="['none','none','none','none']"
                                data-whitespace="['normal','normal','normal','normal']" data-type="text"
                                data-responsive_offset="on"
                                data-frames='[
                                {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                ]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[5,5,5,5]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index: 13; 
                                white-space: normal; 
                                font-weight: 300;
                                color:#00173c;
                                border-width:0px; font-family: 'Teko', sans-serif; text-transform:uppercase;">
                                {{ $slide->subject }}
                            </div>

                            <!-- LAYER NR. 4 [ for paragraph] -->
                            <div class="tp-caption  tp-resizeme" id="slide-901-layer-4"
                                data-x="['left','left','left','left']" data-hoffset="['100','120','30','30']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['70','40','40','-10']"
                                data-fontsize="['20','20','20','16']" data-lineheight="['30','30','30','22']"
                                data-width="['600','600','90%','90%']" data-height="['none','none','none','none']"
                                data-whitespace="['normal','normal','normal','normal']" data-type="text"
                                data-responsive_offset="on"
                                data-frames='[
                                {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                ]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index: 13; 
                                font-weight: 500; 
                                color:#00173c;
                                border-width:0px;font-family: 'Poppins', sans-serif;">
                                {{ $slide->promte_des }}
                            </div>

                            <!-- LAYER NR. 5 [ for see all service botton ] -->
                            <div class="tp-caption tp-resizeme" id="slide-901-layer-5"
                                data-x="['left','left','left','left']" data-hoffset="['100','120','30','30']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['160','130','130','80']"
                                data-lineheight="['none','none','none','none']" data-width="['200','200','200','200']"
                                data-height="['none','none','none','none']"
                                data-whitespace="['normal','normal','normal','normal']" data-type="text"
                                data-responsive_offset="on"
                                data-frames='[ 
                                {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                ]'
                                data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index:13; text-transform:uppercase;">
                                <a href="{{ route('contact') }}" class="site-button site-btn-effect">Contact Us</a>
                            </div>


                            <!-- LAYER NR. 6 [ VIDEO ICON ] -->
                            <div class="tp-caption" id="slide-901-layer-6" data-x="['left','left','left','left']"
                                data-hoffset="['320','350','250','250']" data-y="['middle','middle','middle','middle']"
                                data-voffset="['160','130','130','80']" data-lineheight="['0','0','0','0']"
                                data-width="['100','100','100','100']" data-height="['none','none','none','none']"
                                data-whitespace="['normal','normal','normal','normal']" data-type="text"
                                data-responsive_offset="on"
                                data-frames='[ 
                                {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                ]'
                                data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index:13;">
                                <a href="https://www.youtube.com/watch?v=fgExvIUYg5w" class="mfp-video play-now">
                                    <i class="icon fa fa-play"></i>
                                    <span class="ripple"></span>
                                </a>
                            </div>

                            <!-- LAYER NR. 7 [ ABOUT US ] -->
                            <div class="tp-caption" id="slide-901-layer-7" data-x="['left','left','left','left']"
                                data-hoffset="['420','500','350','0']" data-y="['middle','middle','middle','middle']"
                                data-voffset="['160','130','130','130']" data-lineheight="['none','none','none','none']"
                                data-width="['100','100','100','100']" data-height="['none','none','none','none']"
                                data-whitespace="['normal','normal','normal','normal']" data-type="text"
                                data-responsive_offset="on"
                                data-frames='[ 
                                {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                ]'
                                data-textAlign="['right','right','right','right']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index:13;">
                                <a href="{{ route('about') }}" class="site-button-link">About Us</a>
                            </div>

                        </li>
                    @endforeach


                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
            </div>
        </div>

    </div>
    <!-- SLIDER END -->


    <!-- TOP HALF SECTION START -->
    <div class="section-full small-device p-b40 top-half-section-outer">

        <div class="container">

            <!-- IMAGE CAROUSEL START -->
            <div class="section-content clearfix">
                <div class="top-half-section">

                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-4 col-md-6 m-b50">
                            <div class="service-border-box">
                                <div class="wt-box service-box-1 bg-white">

                                    <div class="service-box-title title-style-2 site-text-secondry">
                                        <span class="s-title-one">Oil & </span>
                                        <span class="s-title-two">Gas Engineering</span>
                                    </div>
                                    <div class="service-box-content">
                                        <p>Progressively maintain extensive infomediaries via extensible nich.
                                            Capitalize on low hanging fruit.</p>
                                        <a href="contact-1.html" class="site-button-link">Read More</a>
                                    </div>
                                    <div class="wt-icon-box-wraper">
                                        <div class="wt-icon-box-md site-bg-primary">
                                            <span class="icon-cell text-white"><i class="flaticon-industry"></i></span>
                                        </div>
                                        <div class="wt-icon-number"><span>01</span></div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 m-b50">
                            <div class="service-border-box">
                                <div class="wt-box service-box-1 bg-white">

                                    <div class="service-box-title title-style-2 site-text-secondry">
                                        <span class="s-title-one">Mechanical</span>
                                        <span class="s-title-two">Engineering</span>
                                    </div>
                                    <div class="service-box-content">
                                        <p>Progressively maintain extensive infomediaries via extensible nich.
                                            Capitalize on low hanging fruit.</p>
                                        <a href="s-mechanical.html" class="site-button-link">Read More</a>
                                    </div>
                                    <div class="wt-icon-box-wraper">
                                        <div class="wt-icon-box-md site-bg-primary">
                                            <span class="icon-cell text-white"><i class="flaticon-conveyor"></i></span>
                                        </div>
                                        <div class="wt-icon-number"><span>02</span></div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6 m-b50">
                            <div class="service-border-box">
                                <div class="wt-box service-box-1 bg-white">

                                    <div class="service-box-title title-style-2 site-text-secondry">
                                        <span class="s-title-one">Automotive</span>
                                        <span class="s-title-two">Manufacturing</span>
                                    </div>
                                    <div class="service-box-content">
                                        <p>Progressively maintain extensive infomediaries via extensible nich.
                                            Capitalize on low hanging fruit.</p>
                                        <a href="s-automotive.html" class="site-button-link">Read More</a>
                                    </div>
                                    <div class="wt-icon-box-wraper">
                                        <div class="wt-icon-box-md site-bg-primary">
                                            <span class="icon-cell text-white"><i class="flaticon-robotic-arm"></i></span>
                                        </div>
                                        <div class="wt-icon-number"><span>03</span></div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- TOP HALF SECTION END -->

    <!-- PROJECTS SECTION START -->
    <div class="section-full p-t80 p-b50  overlay-wraper bg-cover bg-no-repeat"
        style="background-image:url(frontend/images/background/bg-5.jpg);">
        <div class="overlay-main site-bg-secondry opacity-07"></div>

        <div class="container">
            <!-- TITLE START-->
            <div class="section-head center wt-small-separator-outer text-center text-white">
                <div class="wt-small-separator site-text-primary">
                    <div class="sep-leaf-left"></div>
                    <div>Explore Products</div>
                    <div class="sep-leaf-right"></div>
                </div>
                <h2>Check Some Here</h2>
            </div>
            <!-- TITLE END-->

            <div class="section-content">

                <div class="masonry-wrap row mfp-gallery project-stamp clearfix d-flex justify-content-center">
                    <!-- COLUMNS 1 -->
                    <div class="stamp col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b30">
                        <div class="project-stamp-list bg-white">
                            <div class="filter-wrap">
                                <ul class="filter-navigation masonry-filter text-uppercase">
                                    <li class="active"><a data-filter="*" data-hover="All" href="#"><i
                                                class="flaticon-layers"></i>All Cases</a></li>
                                    @foreach ($catagories as $catagory)
                                        <li><a data-filter="#{{ $catagory->catagory_name }}" href="javascript:;">
                                                {{ $catagory->catagory_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 2 -->
                    @foreach ($catagories as $catagory)
                        @php $products = \App\Models\Shop\Product::where('product_catagories',$catagory->catagory_name)->get(); @endphp
                        @foreach ($products as $product)
                            <div class="masonry-item col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b30"
                                id="{{ $catagory->catagory_name }}">
                                <div class="wt-box bg-white  p-a10 project-2-block">
                                    <div class="wt-thum-bx">
                                        <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : asset('img/error/no-image.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="wt-info">
                                        <h4 class="wt-title m-b0 m-t15"><a
                                                href="s-oilgas.html">{{ $product->product_name }}</a></h4>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @endforeach


                </div>

            </div>

        </div>

    </div>
    <!-- PROJECTS SECTION  SECTION END -->

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

                            <p>Progressively maintain extensive infomediaries via extensible nich. Capitalize on
                                low hanging fruit. a ballpark value added is activity to beta test. Override the
                                digital divide with additional click throughs from fruit to identify a ballpark
                                value added.</p>

                            <div class="welcom-to-section-bottom d-flex justify-content-between">
                                <div class="welcom-btn-position"><a href="about-2.html"
                                        class="site-button-secondry site-btn-effect">More About</a></div>
                            </div>
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

    <!-- CLIENT LOGO SECTION START -->
    <div class="section-full bg-white">
        <div class="container">
            <div class="section-content">

                <!-- TESTIMONIAL 4 START ON BACKGROUND -->
                <div class="section-content">
                    <div class="section-content p-tb30 owl-btn-vertical-center">
                        {{-- <div class="owl-carousel home-client-carousel-2">

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w1.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w2.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w3.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w4.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w5.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w6.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w1.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w2.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w3.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w4.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w5.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w6.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w1.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w2.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w3.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w4.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w5.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                                <a href="javascript:void(0);"><img
                                                        src="frontend/images/client-logo/w6.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>

                                </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CLIENT LOGO  SECTION End -->

    <!-- TESTIMONIAL SECTION START -->
    <div class="section-full  p-t80 p-b50 bg-white testimonial-2-outer bg-bottom-right bg-no-repeat"
        style="background-image:url(frontend/images/background/bg-5.png)">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-12 m-b30">
                    <!-- TITLE START-->
                    <div class="left wt-small-separator-outer">
                        <div class="wt-small-separator site-text-primary">
                            <div class="sep-leaf-left"></div>
                            <div>What our client say</div>
                            <div class="sep-leaf-right"></div>
                        </div>
                        <h2>Happy WIth Customers & Clients</h2>
                    </div>
                    <!-- TITLE END-->

                    <div class="testimonial-2-content-outer">
                        <div class="testimonial-2-content owl-carousel  owl-btn-bottom-right long-arrow-next-prev">
                            <div class="item">
                                <div class="testimonial-2 bg-white">
                                    <div class="testimonial-content">

                                        <div class="testimonial-text">
                                            <i class="fa fa-quote-left"></i>
                                            <p>“I have been using products from this chemical provider for years, and I have
                                                always been impressed with the quality and consistency. Their customer
                                                service is top-notch, and they are always willing to go the extra mile to
                                                ensure that we are satisfied with our purchases. I highly recommend this
                                                company to anyone in need of reliable chemical solutions.”</p>
                                        </div>
                                        <div class="testimonial-detail clearfix">
                                            <div class="testimonial-pic-block">
                                                {{-- <div class="testimonial-pic">
                                                    <img src="frontend/images/testimonials/pic1.jpg" alt="">
                                                </div> --}}
                                            </div>
                                            <div class="testimonial-info">
                                                <span class="testimonial-name  title-style-2 site-text-secondry">- Johnatan
                                                    peter
                                                </span>
                                                <span
                                                    class="testimonial-position title-style-2 site-text-primary">Contractor</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="testimonial-2 bg-white">
                                    <div class="testimonial-content">

                                        <div class="testimonial-text">
                                            <i class="fa fa-quote-left"></i>
                                            <p>“As a research scientist, I rely on high-quality chemicals for my
                                                experiments, and this company has never let me down. Their extensive product
                                                range and commitment to excellence make them my go-to supplier for all my
                                                chemical needs. The team is knowledgeable and responsive, making the entire
                                                ordering process seamless.”</p>
                                        </div>
                                        <div class="testimonial-detail clearfix">
                                            <div class="testimonial-pic-block">
                                                {{-- <div class="testimonial-pic">
                                                    <img src="frontend/images/testimonials/pic2.jpg" alt="">
                                                </div> --}}
                                            </div>
                                            <div class="testimonial-info">
                                                <span class="testimonial-name  title-style-2 site-text-secondry">Dr. Sarah
                                                    M
                                                    <span
                                                        class="testimonial-position title-style-2 site-text-primary">Researcher</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="testimonial-2 bg-white">
                                    <div class="testimonial-content">

                                        <div class="testimonial-text">
                                            <i class="fa fa-quote-left"></i>
                                            <p>“We have been sourcing chemicals from this provider for our manufacturing
                                                processes, and we couldn’t be happier with the results. The products are
                                                consistently of the highest quality, and their attention to detail sets them
                                                apart from other suppliers we have worked with in the past. Their dedication
                                                to meeting our specific requirements has been invaluable to our operations.”
                                            </p>
                                        </div>
                                        <div class="testimonial-detail clearfix">
                                            <div class="testimonial-pic-block">
                                                {{-- <div class="testimonial-pic">
                                                    <img src="frontend/images/testimonials/pic3.jpg" alt="">
                                                </div> --}}
                                            </div>
                                            <div class="testimonial-info">
                                                <span class="testimonial-name  title-style-2 site-text-secondry">
                                                    Michael R</span>
                                                <span
                                                    class="testimonial-position title-style-2 site-text-primary">Operations
                                                    Manager</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="testimonial-2 bg-white">
                                    <div class="testimonial-content">

                                        <div class="testimonial-text">
                                            <i class="fa fa-quote-left"></i>
                                            <p>This is not just another nail salon! These ladies are super
                                                talented! My nails have never looked/felt more amazing!! the
                                                environment here is so happy and cheery!</p>
                                        </div>
                                        <div class="testimonial-detail clearfix">
                                            <div class="testimonial-pic-block">
                                                <div class="testimonial-pic">
                                                    <img src="frontend/images/testimonials/pic4.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="testimonial-info">
                                                <span class="testimonial-name  title-style-2 site-text-secondry">Malcolm
                                                    Franzcrip</span>
                                                <span
                                                    class="testimonial-position title-style-2 site-text-primary">Contractor</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-12 m-b30">

                    <div class="home-contact-section site-bg-primary m-b30 p-a40">
                        <form class="cons-contact-form" method="post" action="">

                            <!-- TITLE START-->
                            <div class="wt-small-separator-outer text-white">
                                <h2>Feel free to get in touch!</h2>
                            </div>
                            <!-- TITLE END-->

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input name="username" type="text" required class="form-control"
                                            placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input name="email" type="text" class="form-control" required
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input name="phone" type="text" class="form-control" required
                                            placeholder="Phone">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
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
                                    <button type="submit" class="site-button-secondry site-btn-effect">Send
                                        us a
                                        message</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="hilite-large-title title-style-2">
            <span>Testimonial</span>
        </div>
    </div>
    <!-- TESTIMONIAL SECTION END -->


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
