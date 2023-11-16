@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
{{-- @extends('layouts.user.service') --}}
@extends('layouts.admin.footer')
@section('title', 'SayatCart | Setting')

@section('content')

    <x-admin.dashboard.nav />
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <x-admin.dashboard.flash />
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Update Settings </h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            {{-- <x-user.service.create /> --}}
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

                    <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}"
                        enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <!-- Button -->
                        <div class="form-group float-right">
                            <button type="submit" id="singlebutton" class="btn btn-success">
                                Save
                            </button>
                        </div>
                        <br>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">

                                <fieldset>
                                    <div class="form-row">
                                        <!-- Text input-->
                                        <div class="form-group col-md-6">
                                            <label for="web_name">Company name</label>

                                            <input id="web_name" name="webname" placeholder="Company name"
                                                class="form-control input-md" required type="text"
                                                value="{{ $setting->webname }}">


                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="product_name">Default
                                                Currency</label>

                                            <select id="currency" name="currency" class="form-control">
                                                <option value="{{ $setting->currency }}">{{ $setting->currency }}
                                                </option>
                                                <option value="USD">USD</option>
                                                <option value="NOK">NOK</option>
                                            </select>

                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group col-md-6">
                                            <label for="product_name">Email</label>

                                            <input id="product_price" name="email" placeholder="Email"
                                                class="form-control input-md" required type="text"
                                                value="{{ $setting->email }}">


                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group col-md-6">
                                            <label for="product_brand">Phone</label>

                                            <input id="product_brand" name="phone" placeholder="Phone"
                                                class="form-control input-md" required type="text"
                                                value="{{ $setting->phone }}">


                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group col-md-6">
                                            <label for="product_name">Address 1</label>

                                            <input id="address1" name="address1" placeholder="Address 1"
                                                class="form-control input-md" required type="text"
                                                value="{{ $setting->address1 }}">


                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group col-md-6">
                                            <label for="product_name">Address 2</label>

                                            <input id="address2" name="address2" placeholder="Address 2"
                                                class="form-control input-md" required type="text"
                                                value="{{ $setting->address2 }}">


                                        </div>
                                    </div>
                            </div>
                            </fieldset>
                            {{-- Plan tab start here --}}
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                <fieldset>
                                    <br>
                                    <!-- Text input-->
                                    <div class="card shadow-lg mb-2 bg-white rounded">
                                        <div class="card-img">
                                            <img class="img-thumbnail rounded"
                                                src="{{ asset('storage/' . $setting->deals_background) }}" alt="image"
                                                style="height: fit-content; width: fit-content;" />
                                        </div>
                                        <div class="card-img-overlay" style="position: unset;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="deals_background">Offer/Deal
                                                    Background
                                                    <a href="{{ asset('storage/' . $setting->deals_background) }}"
                                                        data-lightbox="{{ $setting->deals_background }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </label>
                                                <div class="col-md-4">
                                                    <input id="filebutton" name="deals_background"
                                                        value="{{ $setting->deals_background }}" class="input-file"
                                                        type="file">
                                                </div>
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

                                        <div class="card-img-overlay" style="position: unset;">

                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="right_advert">View
                                                    <a href="{{ asset('storage/' . $setting->right_advert) }}"
                                                        data-lightbox="{{ $setting->right_advert }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </label>
                                                <div class="col-md-4">
                                                    <input id="right_advert" name="right_advert" class="input-file"
                                                        type="file" value="{{ $setting->right_advert }}">

                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="product_categorie">Right advert target collection</label>
                                                <select id="product_catagories" name="right_advert_target"
                                                    class="form-control" required>
                                                    <option value="{{ $setting->right_advert_target }}" selected>
                                                        {{ $setting->right_advert_target }}</option>
                                                    @foreach ($catagories as $catagory)
                                                        <option value="{{ $catagory['catagory_name'] }}">
                                                            {{ $catagory['catagory_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">

                                                <div class="col-md-4">

                                                    <b>@php echo $setting->right_advert_des; @endphp</b>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">


                                            <textarea class="form-control" id="right_advert_des" name="right_advert_des">
                                                    {{ $setting->right_advert_des }}
                                                </textarea>

                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="card shadow-lg mb-2 bg-white rounded">
                                        <div class="card-img">
                                            <img class="img-thumbnail rounded"
                                                src="{{ asset('storage/' . $setting->left_advert) }}" alt="image"
                                                style="height: fit-content; width: fit-content;" />
                                        </div>
                                        <div class="card-img-overlay" style="position: unset;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="left_advert">View
                                                    <a href="{{ asset('storage/' . $setting->left_advert) }}"
                                                        data-lightbox="{{ $setting->left_advert }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </label>

                                                <div class="col-md-4">
                                                    <input id="left_advert" name="left_advert" class="input-file"
                                                        type="file" value="{{ $setting->left_advert }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="product_categorie">Left advert target collection</label>
                                                <select id="product_catagories" name="left_advert_target"
                                                    class="form-control" required>
                                                    <option value="{{ $setting->left_advert_target }}" selected>
                                                        {{ $setting->left_advert_target }}</option>
                                                    @foreach ($catagories as $catagory)
                                                        <option value="{{ $catagory['catagory_name'] }}">
                                                            {{ $catagory['catagory_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">

                                                <div class="col-md-4">

                                                    <b>@php echo $setting->left_advert_des; @endphp</b>

                                                </div>
                                            </div>

                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">


                                            <textarea class="form-control" id="left_advert_des" name="left_advert_des">
                                                {{ $setting->left_advert_des }}
                                            </textarea>

                                        </div>
                                    </div>


                                    <!-- Text input-->
                                    <div class="card shadow-lg mb-2 bg-white rounded">
                                        <div class="card-img">
                                            <img class="img-thumbnail rounded"
                                                src="{{ asset('storage/' . $setting->feature_left_advert) }}"
                                                alt="image" style="height: fit-content; width: fit-content;" />
                                        </div>
                                        <div class="card-img-overlay" style="position: unset;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="feature_left_advert">View
                                                    <a href="{{ asset('storage/' . $setting->feature_left_advert) }}"
                                                        data-lightbox="{{ $setting->feature_left_advert }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </label>

                                                <div class="col-md-4">
                                                    <input id="feature_left_advert" name="feature_left_advert"
                                                        class="input-file" type="file"
                                                        value="{{ $setting->feature_left_advert }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="product_categorie">Left feature target collection</label>
                                                <select id="product_catagories" name="feature_left_target"
                                                    class="form-control" required>
                                                    <option value="{{ $setting->feature_left_target }}" selected>
                                                        {{ $setting->feature_left_target }}</option>
                                                    @foreach ($catagories as $catagory)
                                                        <option value="{{ $catagory['catagory_name'] }}">
                                                            {{ $catagory['catagory_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">

                                                <div class="col-md-4">

                                                    <b>@php echo $setting->feature_left_des; @endphp</b>

                                                </div>
                                            </div>

                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">


                                            <textarea class="form-control" id="feature_left_des" name="feature_left_des">
                                                {{ $setting->feature_left_des }}
                                            </textarea>

                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="card shadow-lg mb-2 bg-white rounded">
                                        <div class="card-img">
                                            <img class="img-thumbnail rounded"
                                                src="{{ asset('storage/' . $setting->feature_right_advert) }}"
                                                alt="image" style="height: fit-content; width: fit-content;" />
                                        </div>
                                        <div class="card-img-overlay" style="position: unset;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="feature_right_advert">View
                                                    <a href="{{ asset('storage/' . $setting->feature_right_advert) }}"
                                                        data-lightbox="{{ $setting->feature_right_advert }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </label>

                                                <div class="col-md-4">
                                                    <input id="feature_right_advert" name="feature_right_advert"
                                                        class="input-file" type="file"
                                                        value="{{ $setting->feature_right_advert }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="product_categorie">Right feature target collection</label>
                                                <select id="product_catagories" name="feature_right_target"
                                                    class="form-control" required>
                                                    <option value="{{ $setting->feature_right_target }}" selected>
                                                        {{ $setting->feature_right_target }}</option>
                                                    @foreach ($catagories as $catagory)
                                                        <option value="{{ $catagory['catagory_name'] }}">
                                                            {{ $catagory['catagory_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <b>@php echo $setting->feature_right_des; @endphp</b>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <textarea class="form-control" id="feature_right_des" name="feature_right_des">
                                                {{ $setting->feature_right_des }}
                                            </textarea>

                                        </div>
                                    </div>


                                    <!-- Text input-->
                                    <div class="card shadow-lg mb-2 bg-white rounded">
                                        <div class="card-img">
                                            <img class="img-thumbnail rounded float-right"
                                                src="{{ asset('storage/' . $setting->big_banner_feature) }}"
                                                alt="image" style="height: fit-content; width: fit-content;" />
                                        </div>
                                        <div class="card-img-overlay" style="position: unset;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="left_advert">Big
                                                    banner(feature
                                                    items) Ad Offer
                                                    <a href="{{ asset('storage/' . $setting->big_banner_feature) }}"
                                                        data-lightbox="{{ $setting->big_banner_feature }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </label>
                                                <div class="col-md-4">
                                                    <input id="big_banner_feature" name="big_banner_feature"
                                                        class="input-file" type="file"
                                                        value="{{ $setting->big_banner_feature }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            {{-- Plan tab start here --}}
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <fieldset>
                                    <!-- Textarea -->
                                    <div class="form-group">
                                        <label for="product_description">About
                                            description</label>

                                        <textarea class="form-control" id="product_description" name="about">
                                        {{ $setting->about }}
                                    </textarea>

                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>

@endsection
