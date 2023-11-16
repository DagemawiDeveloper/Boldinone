@section('getintouch')
    <!-- Get In Touch -->
    <div class="contact-slide-hide bg-cover bg-no-repeat" style="background-image:url(frontend/images/background/bg-7.jpg)">
        <div class="contact-nav">
            <a href="javascript:void(0)" class="contact_close">&times;</a>
            <div class="contact-nav-form">
                <div class="contact-nav-info bg-white p-a30 bg-center bg-no-repeat"
                    style="background-image:url(frontend/images/background/bg-map2.png);">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="contact-nav-media-section">
                                <div class="contact-nav-media">
                                    <img src="frontend/images/self-pic.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <form class="cons-contact-form" method="post" action="">
                                <div class="m-b30">
                                    <!-- TITLE START -->
                                    <h2 class="m-b30">Get In Touch</h2>
                                    <!-- TITLE END -->
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
                                            <button type="submit" class="site-button site-btn-effect">Submit
                                                Now</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                            <div class="contact-nav-inner text-black">
                                <!-- TITLE START -->
                                <h2 class="m-b30">Contact Info</h2>
                                <!-- TITLE END -->
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="wt-icon-box-wraper left icon-shake-outer">
                                            <div class="icon-content">
                                                <h4 class="m-t0">Phone number</h4>
                                                <p>{{ $setting->phone }}</p>
                                                {{-- <p>{{ $setting->phone2 }}</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="wt-icon-box-wraper left icon-shake-outer">
                                            <div class="icon-content">
                                                <h4 class="m-t0">Email address</h4>
                                                <p>{{ $setting->email }}</p>
                                                {{-- <p>indusinfo@gmail.com</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="wt-icon-box-wraper left icon-shake-outer">
                                            <div class="icon-content">
                                                <h4 class="m-t0">Address info</h4>
                                                <p>{{ $setting->address1 }}</p>
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

    <!-- BUTTON TOP START -->
    <button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>

@show
