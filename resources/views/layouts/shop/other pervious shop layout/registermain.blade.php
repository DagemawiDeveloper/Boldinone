        <!-- Main -->
        <main class="main--wrapper">

            <!-- page banner area start -->
            <section class="page-banner-area" data-background="img/shop/bg/page-banner.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-sm-12">
                            <div class="banner-text text-center pt-90 pb-25">
                                <h2 class="f-800 cod__black-color">Sign Up</h2>
                                <p class="mb-60">
                                    Buy what you don't have yet, or what you really want, which can be mixed with what
                                    you already own.
                                </p>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">My Account.</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- page banner area end -->

            <!-- reg area start -->
            <section class="reg-area pt-60 pb-75">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="reg-wrapper">
                                <ul class="nav" id="myTab" role="tablist">
                                    <li class="nav-item mr-40">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">Sign In</a>
                                    </li>
                                    <li class="nav-item ml-40">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile"
                                            aria-selected="false">Registration</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="field">
                                                <label>Username or Email ID</label>
                                                <input type="text" name="email"
                                                    placeholder="Username or Email Address" required />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red" />
                                            </div>
                                            <div class="field">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Password"
                                                    required />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red" />
                                            </div>
                                            <button type="submit">Login</button>
                                            <span>
                                                <input type="checkbox" id="remember_me" class="check" name="remember">
                                                Remember me
                                            </span>
                                            <a href="{{ route('password.request') }}" class="lost-pass">Lost Your
                                                Password?</a>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        @if (Session::has('success'))
                                            <p style='color:green'>{{ Session::get('success') }}</p>
                                        @endif

                                        {{-- Register --}}
                                        <form action="{{ route('register-client') }}" method="POST">
                                            @csrf
                                            <div class="field">
                                                <label>First name</label>
                                                <input type="text" name="name" placeholder="Username" required>
                                            </div>

                                            <div class="field">
                                                <label>Last name</label>
                                                <input type="text" name="lastname" placeholder="Lastname" required>
                                            </div>

                                            {{-- <input type="hidden" name="role_id" required value="6"/> --}}
                                            <div class="field">
                                                <label>Email ID</label>
                                                <input type="text" name="email" placeholder="Email Address"
                                                    required>
                                            </div>

                                            <div class="field">
                                                <label>Address</label>
                                                <input type="text" name="address" placeholder="Address" required>
                                            </div>

                                            <div class="field">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="field">
                                                <label>Password confirmation</label>
                                                <input type="password" name="password_confirmation"
                                                    placeholder="Password" required>
                                            </div>
                                            <button type="submit">Login</button>
                                            <span>
                                                <input type="checkbox" id="remember_me" class="check"
                                                    name="remember">
                                                Remember me
                                            </span>
                                            <a href="{{ route('password.request') }}" class="lost-pass">Lost Your
                                                Password?</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- reg area end -->

        </main>
        <!-- Main End -->
