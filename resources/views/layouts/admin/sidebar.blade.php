@section('sidebar')
    @if (Auth::user()->hasRole('users'))
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                {{-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> --}}
                <div class="sidebar-brand-text mx-3">@yield('title') </div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
    @endif

    @if (Auth::user()->hasRole('admin'))
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                </div>
                <div class="sidebar-brand-text mx-3">@yield('title') <sup>ET</sup></div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Utilities Collapse Menu -->
            {{-- <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-wrench"></i>
                            <span>Authorization</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Authorize:</h6>
                                <a class="collapse-item" href="{{ route('admin.adduser.index') }}">Add User</a>
                                <a class="collapse-item" href="{{ route('admin.roles.index') }}">Roles</a>
                                <a class="collapse-item" href="{{ route('admin.permissions.index') }}">Permission</a>
                            </div>
                        </div>
                    </li> --}}


            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.slide.index') }}">
                    <i class="fa fa-images"></i>
                    <span>Slide</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                    <i class="fa fa-store">
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">{{ $count }}</span>
                    </i>
                    <span>Order</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.plans.index') }}">
                    <i class="fa fa-tags"></i>
                    <span>Deal plan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    <i class="fa fa-box-open"></i>
                    <span>Product</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.catagories.index') }}">
                    <i class="fas fa fa-bars"></i>
                    <span>Categories</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Settings</span>
                </a>
            </li>
            <br><br><br><br>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
    @else
        <!-- Heading -->
        <div class="sidebar-heading">
            Manage
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.service.index') }}">
                <i class="fas fa fa-briefcase"></i>
                <span>Services</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.catagories.index') }}">
                <i class="fas fa fa-bars"></i>
                <span>Categories</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


        </ul>
        <!-- End of Sidebar -->
    @endif
@endsection
