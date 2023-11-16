@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
{{-- @extends('layouts.user.service') --}}
@extends('layouts.admin.footer')
@section('title', 'SayatCart | Setting')

@section('content')
    @php
        $color = [
            'aliceblue' => 'aliceblue',
            'gainsboro' => 'gainsboro',
            'antiquewhite' => 'antiquewhite',
            'ivory' => 'ivory',
        ];
    @endphp
    <x-admin.dashboard.nav />
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <x-admin.dashboard.flash />
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Settings</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Setting</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Offer
                                Ad</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">About</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <!-- Page Heading -->
                            <div class="card shadow-lg p-3 mb-2">
                                <div class="card-body">
                                    @foreach ($list_setting as $setting)
                                        <fieldset>
                                            <br>
                                            <a href="{{ route('admin.settings.edit', $setting->id) }}"
                                                class="btn btn-success m-1" style="float: right">
                                                <span class="icon text-white-50">
                                                    <i class="fa fa-pen" style="color: #ffffff;"></i>
                                                </span>
                                            </a>
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="product_name">Company
                                                    name</label>
                                                <div class="col-md-4">
                                                    <b>{{ $setting->webname }}</b>

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="product_name">Default
                                                    currency</label>
                                                <div class="col-md-4">
                                                    <b>{{ $setting->currency }}</b>

                                                </div>
                                            </div>



                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="product_name">Email</label>
                                                <div class="col-md-4">
                                                    <b>{{ $setting->email }}</b>

                                                </div>
                                            </div>
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="product_brand">Phone</label>
                                                <div class="col-md-4">
                                                    <b>{{ $setting->phone }}</b>

                                                </div>
                                            </div>
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="product_name">Address 1</label>
                                                <div class="col-md-4">
                                                    <b>{{ $setting->address1 }}</b>

                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="product_name">Address 2</label>
                                                <div class="col-md-4">
                                                    <b>{{ $setting->address2 }}</b>

                                                </div>
                                            </div>


                                        </fieldset>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Plan tab start here --}}
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <a href="{{ route('admin.settings.edit', $setting->id) }}"
                                class="btn btn-success m-1 float-right">
                                <span class="icon text-white-50">
                                    <i class="fa fa-pen" style="color: #ffffff;"></i>
                                </span>
                            </a>
                            <fieldset>
                                <br>
                                <!-- Text input-->
                                <div class="card shadow-lg mb-2 bg-white rounded">
                                    <div class="card-img">
                                        <img class="img-thumbnail rounded"
                                            src="{{ asset('storage/' . $setting->deals_background) }}" alt="image"
                                            style="height: fit-content; width: fit-content;" />
                                    </div>
                                    <div class="card-img-overlay">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="deals_background">Offer/Deal
                                                Background
                                                <a href="{{ asset('storage/' . $setting->deals_background) }}"
                                                    data-lightbox="{{ $setting->deals_background }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </label>
                                            {{-- <div class="col-md-4">
                                                <b>{{ $setting->deals_background }}</b>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="card shadow-lg mb-2 bg-white rounded">
                                    <div class="card-img">
                                        <img class="img-thumbnail rounded"
                                            src="{{ asset('storage/' . $setting->right_advert) }}" alt="image"
                                            style="height: fit-content; width: fit-content;" />
                                    </div>

                                    <div class="card-img-overlay">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="right_advert">View
                                                <a href="{{ asset('storage/' . $setting->right_advert) }}"
                                                    data-lightbox="{{ $setting->right_advert }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </label>
                                            {{-- <div class="col-md-4">
                                                <b>{{ $setting->right_advert }}</b>

                                            </div> --}}
                                        </div>
                                        <div class="form-group">

                                            <div class="col-md-4">
                                                <b>{{ $setting->right_advert_target }}</b>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-md-4">

                                                <b>@php echo $setting->right_advert_des; @endphp</b>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="card shadow-lg mb-2 bg-white rounded">
                                    <div class="card-img">
                                        <img class="img-thumbnail rounded"
                                            src="{{ asset('storage/' . $setting->left_advert) }}" alt="image"
                                            style="height: fit-content; width: fit-content;" />
                                    </div>
                                    <div class="card-img-overlay">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="left_advert">View
                                                <a href="{{ asset('storage/' . $setting->left_advert) }}"
                                                    data-lightbox="{{ $setting->left_advert }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </label>

                                            {{-- <div class="col-md-4">
                                                <b>{{ $setting->left_advert }}</b>
                                            </div> --}}
                                        </div>
                                        <div class="form-group">

                                            <div class="col-md-4">
                                                <b>{{ $setting->left_advert_target }}</b>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-md-4">

                                                <b>@php echo $setting->left_advert_des; @endphp</b>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="card shadow-lg mb-2 bg-white rounded">
                                    <div class="card-img">
                                        <img class="img-thumbnail rounded"
                                            src="{{ asset('storage/' . $setting->feature_left_advert) }}" alt="image"
                                            style="height: fit-content; width: fit-content;" />
                                    </div>
                                    <div class="card-img-overlay">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="left_advert">View
                                                <a href="{{ asset('storage/' . $setting->feature_left_advert) }}"
                                                    data-lightbox="{{ $setting->feature_left_advert }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </label>

                                            {{-- <div class="col-md-4">
                                                <b>{{ $setting->left_advert }}</b>
                                            </div> --}}
                                        </div>
                                        <div class="form-group">

                                            <div class="col-md-4">
                                                <b>{{ $setting->feature_left_advert_target }}</b>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-md-4">

                                                <b>@php echo $setting->feature_left_advert_des; @endphp</b>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="card shadow-lg mb-2 bg-white rounded">
                                    <div class="card-img">
                                        <img class="img-thumbnail rounded"
                                            src="{{ asset('storage/' . $setting->feature_right_advert) }}" alt="image"
                                            style="height: fit-content; width: fit-content;" />
                                    </div>
                                    <div class="card-img-overlay">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="left_advert">View
                                                <a href="{{ asset('storage/' . $setting->feature_right_advert) }}"
                                                    data-lightbox="{{ $setting->feature_right_advert }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </label>

                                            {{-- <div class="col-md-4">
                                                <b>{{ $setting->left_advert }}</b>
                                            </div> --}}
                                        </div>
                                        <div class="form-group">

                                            <div class="col-md-4">
                                                <b>{{ $setting->feature_right_target }}</b>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-md-4">

                                                <b>@php echo $setting->feature_right_des; @endphp</b>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="card shadow-lg mb-2 bg-white rounded">
                                    <div class="card-img">
                                        <img class="img-thumbnail rounded float-right"
                                            src="{{ asset('storage/' . $setting->big_banner_feature) }}" alt="image"
                                            style="height: fit-content; width: fit-content;" />
                                    </div>
                                    <div class="card-img-overlay" href="">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="left_advert">Big banner(feature
                                                items) Ad Offer
                                                <a href="{{ asset('storage/' . $setting->big_banner_feature) }}"
                                                    data-lightbox="{{ $setting->big_banner_feature }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </label>
                                            {{-- <div class="col-md-4">
                                                <b>{{ $setting->big_banner_feature }}</b>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        {{-- Plan tab start here --}}
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <br>
                                        <a href="{{ route('admin.settings.edit', $setting->id) }}"
                                            class="btn btn-success m-1" style="float: right">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-pen" style="color: #ffffff;"></i>
                                            </span>
                                        </a>
                                        <!-- Textarea -->
                                        <div class="form-group p-5">
                                            <label class="col-md-4 control-label" for="product_description">About
                                                description</label>
                                            <div>

                                                @php echo $setting->about; @endphp

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
