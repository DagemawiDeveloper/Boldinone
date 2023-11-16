@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
{{-- @extends('layouts.user.service') --}}
@extends('layouts.admin.footer')
@section('title', 'SayatCart | Products')

@section('content')
    @php $now = date('Y-m-d'); @endphp
    <x-admin.dashboard.nav />
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <x-admin.dashboard.flash />
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Product </h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            <a href="{{ route('admin.products.create') }}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>

            {{-- <x-user.service.create /> --}}
            <div id="content">
                <div class="m-2 p-2">
                    <a href="{{ route('admin.products.index') }}" class="px-4 py-2 btn btn-light"><i
                            class="fa fa-arrow-left"></i> Back</a>
                </div>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="product_setting-tab" data-bs-toggle="tab"
                                data-bs-target="#product_setting" type="button" role="tab"
                                aria-controls="product_setting" aria-selected="true">Product Setting</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="product_decription-tab" data-bs-toggle="tab"
                                data-bs-target="#product_decription" type="button" role="tab"
                                aria-controls="product_decription" aria-selected="false">Product Decription</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="product_images-tab" data-bs-toggle="tab"
                                data-bs-target="#product_images" type="button" role="tab"
                                aria-controls="product_images" aria-selected="false">Product Images</button>
                        </li>
                    </ul>
                    <br>
                    <form method="POST" action="{{ route('admin.products.update', $product->id) }}"
                        enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <!-- Button -->
                        <div class="form-group float-right">
                            <button type="submit" id="singlebutton" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="product_setting" role="tabpanel"
                                aria-labelledby="product_setting-tab">
                                <fieldset>
                                    <!-- Text input-->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="product_name">PRODUCT NAME</label>
                                            <input id="product_name" name="product_name" placeholder="PRODUCT NAME"
                                                maxlength="50" class="form-control input-md" required type="text"
                                                value="{{ $product['product_name'] }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="product_brand">PRODUCT BRAND</label>
                                            <input id="product_brand" name="product_brand" placeholder="PRODUCT BRAND"
                                                class="form-control input-md" required type="text"
                                                value="{{ $product['product_brand'] }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="product_categorie">PRODUCT CATEGORY</label>
                                            <select id="product_catagories" name="product_catagories" class="form-control">
                                                <option value="{{ $product->product_catagories }}" selected>
                                                    {{ $product->product_catagories }}</option>
                                                @foreach ($catagories as $catagory)
                                                    <option value="{{ $catagory['catagory_name'] }}">
                                                        {{ $catagory['catagory_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>



                                        <input id="approuved_by" name="product_list_by" required
                                            value="{{ Auth::user()->name }}" type="text" hidden>



                                        <div class="form-group col-md-6">
                                            <label for="product_name">PRODUCT PRICE</label>
                                            <input id="product_price" name="product_price" placeholder="PRODUCT PRICE"
                                                class="form-control input-md" required type="number"
                                                value="{{ $product->product_price }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="product_name">PRODUCT DISCOUNT</label>
                                            <input id="product_discount" name="product_discount" min="1"
                                                placeholder="PRODUCT DISCOUNT" class="form-control input-md"
                                                type="number" value="{{ $product->product_discount }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="product_available">PRODUCT AVAILABLITY</label>
                                            <select id="product_available" name="product_available" class="form-control">
                                                <option value="{{ $product->product_available }}">
                                                    {{ $product->product_available }}</option>
                                                <option value="instock">InStock</option>
                                                <option value="outstock">outStock</option>
                                            </select>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="product_name">PRODUCT QUANTITY</label>
                                            <input id="product_quantity" name="product_quantity"
                                                placeholder="PRODUCT QUANTITY" class="form-control input-md" required
                                                type="number" value="{{ $product->product_quantity }}">

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="is_featured">Is it FEATURE?</label>
                                            <select id="is_featured" name="is_featured" class="form-control">
                                                <option value="{{ $product->is_featured }}">
                                                    @if ($product->is_featured == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="product_trending">Is it TRENDING?</label>
                                            <select id="product_trending" name="product_trending" class="form-control">
                                                <option value="{{ $product->product_trending }}">
                                                    @if ($product->product_trending == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="deal_target">Deal plan</label>
                                            @php
                                                $product_planid = $product->plan_id;
                                                $plan_deal = \App\Models\Shop\Plan::where('id', '=', $product_planid)->get();
                                                // dd($plan_deal);
                                            @endphp
                                            @if ($plan_deal != null)
                                                @foreach ($plan_deal as $plan)
                                                    <select id="plan_id" required
                                                        @if ($now > $plan->plan_target_date) style="color: red" @else style="color: green" @endif
                                                        name="plan_id" class="form-control">
                                                        <option value="" required
                                                            @if ($now > $plan->plan_target_date) style="color: red" @endif>
                                                            @if ($plan->plan_target_date == null)
                                                                <b style="color: gold">No Deal</b>
                                                            @elseif($now > $plan->plan_target_date)
                                                                <b style="color: red">Expired choose another plan</b>
                                                            @else
                                                                {{ $plan->plan_target_date }}
                                                            @endif
                                                        </option>
                                                        <option value="">None</option>
                                                        @foreach ($plans as $plan)
                                                            <option style="color: green" value="{{ $plan->id }}">
                                                                {{ $plan->plan_name }}&nbsp<b
                                                                    style="color: darkblue">{{ $plan->plan_target_date }}</b>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endforeach
                                            @endif

                                            @if (\App\Models\Shop\Plan::where('id', '=', $product_planid)->doesntExist())
                                                <select id="plan_id" name="plan_id" class="form-control">
                                                    <option value="" selected>None</option>
                                                    @foreach ($plans as $plan)
                                                        <option style="color: green" value="{{ $plan->id }}">
                                                            {{ $plan->plan_name }}&nbsp<b
                                                                style="color: darkblue">{{ $plan->plan_target_date }}</b>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="product_decription" role="tabpanel"
                                aria-labelledby="product_decription-tab">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label for="product_description">Product Description (Highlight)</label>
                                        <textarea id="product_description" name="product_description">
                                                    {{ $product->product_description }}
                                                </textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="product_specification">Product Specification</label>
                                        <textarea id="product_specification" name="product_specification">
                                                    {{ $product->product_specification }}
                                                </textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="product_long_description">Product Details (long description)</label>
                                        <textarea id="product_long_description" name="product_long_description">
                                                    {{ $product->product_long_description }}
                                                </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product_images" role="tabpanel"
                                aria-labelledby="product_images-tab">
                                <!-- File Button -->
                                <div class="form-group">

                                    <div class="col-md-4">
                                        <label for="filebutton">Main_image
                                            <a href="{{ asset('storage/' . $product->main_image) }}"
                                                data-lightbox="{{ $product->product_name }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </label>
                                        <input id="filebutton" name="main_image" class="input-file" type="file"
                                            value="{{ $product->main_image }}">
                                        {{ $product->main_image }}
                                    </div>
                                    <br>
                                    <!-- File Button -->

                                    <div class="col-md-4">
                                        <label for="filebutton">Big_image 1
                                            <a href="{{ asset('storage/' . $product->big_image) }}"
                                                data-lightbox="{{ $product->product_name }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </label>
                                        <input id="filebutton" name="big_image" class="input-file" type="file"
                                            value="{{ $product->big_image }}">
                                        {{ $product->big_image }}
                                    </div>
                                    <br>
                                    <!-- File Button -->

                                    <div class="col-md-4">
                                        <label for="filebutton">Big Image 2
                                            <a href="{{ asset('storage/' . $product->big_image1) }}"
                                                data-lightbox="{{ $product->product_name }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </label>
                                        <input id="filebutton" name="big_image1" class="input-file" type="file"
                                            value="{{ $product->big_image1 }}">
                                        {{ $product->big_image1 }}
                                    </div>
                                    <br>
                                    <!-- File Button -->

                                    <div class="col-md-4">
                                        <label for="filebutton">Big Image 3
                                            <a href="{{ asset('storage/' . $product->image4) }}"
                                                data-lightbox="{{ $product->product_name }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </label>
                                        <input id="filebutton" name="big_image2" class="input-file" type="file"
                                            value="{{ $product->big_image2 }}">
                                        {{ $product->big_image2 }}
                                    </div>

                                </div>


                                </fieldset>

                            </div>
                        </div>
                    </form>
                    <!-- Page Heading -->
                    <div class="col-auto">







                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
