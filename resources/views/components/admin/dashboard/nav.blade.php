    @props(['nav'])
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                @if (request()->route()->named('admin.products.*'))
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2" id="search_products" autocomplete="off">
                    <div class="input-group-append">
                        <button style="background: #f8f9fc;border: 1px;" id="reset" type="reset">x</button>
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                    {{-- @elseif(request()->route()->named('admin.orders.*'))
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2" id="search_orders">
                    <div class="input-group-append">
                        <button style="background: #f8f9fc;border: 1px;" id="reset" type="reset">x</button>
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div> --}}
                @elseif(request()->route()->named('admin.catagories.*'))
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2" id="search_categories" autocomplete="off">

                    <div class="input-group-append">
                        <button style="background: #f8f9fc;border: 1px;" id="reset" type="reset">x</button>
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                @endif
                <br>
                @if (request()->route()->named('admin.products.*'))
                    <div class="search_back" id="search_view_products">

                    </div>
                @elseif(request()->route()->named('admin.orders.*'))
                    <div class="search_back" id="search_view_orders">

                    </div>
                @elseif(request()->route()->named('admin.catagories.*'))
                    <div class="search_back" id="search_view_catagories">

                    </div>
                @endif
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            @if (request()->route()->named('admin.products.*'))
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" id="search_products_mobile"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button style="background: #f8f9fc;border: 1px;" id="reset"
                                        type="reset">x</button>

                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            @elseif(request()->route()->named('admin.orders.*'))
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" id="search_orders_mobile"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button style="background: #f8f9fc;border: 1px;" id="reset"
                                        type="reset">x</button>

                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            @elseif(request()->route()->named('admin.catagories.*'))
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" id="search_categories_mobile"
                                    aria-describedby="basic-addon2">

                                <div class="input-group-append">
                                    <button style="background: #f8f9fc;border: 1px;" id="reset"
                                        type="reset">x</button>

                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            @endif

                        </div>
                    </form>
                    <!-- Search Results List -->
                    <br>
                    <div class="search_view">
                        @if (request()->route()->named('admin.products.*'))
                            <div class="search_back" id="search_view_products_mobile">

                            </div>
                        @elseif(request()->route()->named('admin.orders.*'))
                            <div class="search_back" id="search_view_orders_mobile">

                            </div>
                        @elseif(request()->route()->named('admin.catagories.*'))
                            <div class="search_back" id="search_view_categories_mobile">

                            </div>
                        @endif
                    </div>
                </div>
            </li>

            <!-- Nav Item - Messages -->
            {{-- <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter">7</span>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                        Message Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="{{asset('img/undraw_profile_1.svg')}}"
                                alt="...">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                problem I've been having.</div>
                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                        </div>
                    </a>

                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                </div>
            </li> --}}

            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - Site Preview -->
            <a href="/" target="_blank" role="button"><i class="fa fa-store"
                    style="margin-top: 25px; font-size:24px;"></i></a>


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    {{-- <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a> --}}
                    {{-- <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a> --}}
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->
