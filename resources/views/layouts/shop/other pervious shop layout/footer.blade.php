@section('footer')
    <!-- Footer -->
    <footer class="footer--area">
        <div class="footer--top pt-70 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-8 mb-30">
                        <div class="footer-widget">
                            <div class="footer-title">
                                <h6 class="f-800">Contact Information</h6>
                            </div>
                            <div class="contacts-address">
                                <div class="contacts-icon">
                                    <i class="icofont-headphone-alt-3"></i>
                                </div>
                                <div class="contacts-address--text">
                                    <span>Got Questions? Call Us 24/7</span>
                                    <h5 class="f-800">{{ $setting->phone }} / {{ $setting->phone2 }}</h5>
                                </div>
                            </div>
                            <div class="contacts-address--footer">
                                <p>{{ $setting->address }} <a href=""><span class="__cf_email__"
                                            data-cfemail="">info@SayatCart.com</span></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-8 mb-30 order-md-3 order-lg-2">
                        <div class="footer-widget">
                            <div class="footer-title">
                                <h6 class="f-800">Get to Know Us</h6>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="#">Careers</a></li>
                                    {{-- <li><a href="#">Press Releases</a></li> --}}
                                    {{-- <li><a href="#">Cart Cares</a></li> --}}
                                    {{-- <li><a href="#">Gift a Smile</a></li> --}}
                                    {{-- <li><a href="#">Your Account</a></li> --}}
                                    {{-- <li><a href="#">Returns Center</a></li> --}}
                                    {{-- <li><a href="#">100% Purchase Protection</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 mb-30 col-lg-6 col-md-4 order-md-2 order-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-title">
                                <h6 class="f-800">Get to Know Us</h6>
                            </div>
                            <div class="footer-menu h1foote-menu2">
                                <ul>
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Instagram</a></li>
                                    <li><a href="#">Youtube</a></li>
                                    <li><a href="#">Pintrest</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-2 col-lg-6 col-md-4 mb-30 order-md-4 order-lg-4 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-title">
                                <h6 class="f-800">Let Us Help You</h6>
                            </div>
                            <div class="footer-menu h1foote-menu2">
                                <ul>
                                    <li><a href="#">Your Account</a></li>
                                    <li><a href="#">Returns Centre</a></li>
                                    <li><a href="#">100% Purchase Protection</a></li>
                                    <li><a href="#">Cartbit App Download</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="footer-bottom gray-bg pt-20 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="footer-copyright">
                            <p class="m-0">Copyright&nbsp;©{{ now()->year }}&nbsp; {{ $setting->webname }}.com All
                                Rights Reserved.
                                &nbsp;<a href="https://www.facebook.com/etsystemssoftware/" target="_blank"><small
                                        style="color: dodgerblue">Developed by Dagemawi Alemayehu (Et-systems)</small></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer-payment--sponsors text-right">
                            <a href="#" class="payment-images"><img src="img/shop/payment/payment-thumb.png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    </html>
@show
