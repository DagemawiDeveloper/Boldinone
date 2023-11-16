@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
{{-- @extends('layouts.user.service') --}}
@extends('layouts.admin.footer')
@section('title', 'SayatCart | Categories')

@section('content')

    <x-admin.dashboard.nav />
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <x-admin.dashboard.flash />
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Categories</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            <a href="{{ route('admin.catagories.create') }}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>

            {{-- <x-user.catagories.editcatagories /> --}}

            <div id="content">
                <div class="m-2 p-2">
                    <a href="{{ route('admin.catagories.index') }}" class="px-4 py-2 btn btn-light"><i
                            class="fa fa-arrow-left"></i> Back</a>
                </div>
                <x-admin.dashboard.flash />
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="col-auto shadow-sm p-4 bg-white rounded">
                        <form method="POST" action="{{ route('admin.catagories.update', $catagory->id) }}"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="catagories_name">CATEGORIES NAME</label>
                                    <div class="col-md-4">
                                        <input id="product_name" name="catagory_name" class="form-control input-md"
                                            required="" type="text" value="{{ $catagory->catagory_name }}">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="catagories_name">Menu</label>
                                    <div class="col-md-4">
                                        <!-- Default checked -->
                                        {{-- <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                                <label class="custom-control-label" for="customSwitch1">Switch for menu</label>
                                            </div> --}}
                                        <!-- Small switch -->
                                        <div class="form-check form-switch">

                                            @if ($catagory->is_menu > 0)
                                                <span class="m-2">Yes</span><input type="checkbox" data-toggle="toggle"
                                                    data-size="sm" name="is_menu" role="switch"
                                                    value="{{ $catagory->is_menu }}" checked class="switch"
                                                    id="switch-sm" />
                                                <span class="m-2">No</span><input type="checkbox" data-toggle="toggle"
                                                    data-size="sm" name="is_menu" role="switch" value="0"
                                                    class="switch" id="switch-sm" />
                                            @else
                                                <span class="m-2">Yes</span><input type="checkbox" data-toggle="toggle"
                                                    data-size="sm" name="is_menu" role="switch" value="1"
                                                    class="switch" id="switch-sm" />
                                                <span class="m-2">No</span><input type="checkbox" data-toggle="toggle"
                                                    data-size="sm" name="is_menu" role="switch" value="0"
                                                    class="switch" style="background-color: brown" id="switch-sm" />
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="product_categorie">Sub category of</label>
                                    <div class="col-md-4">
                                        <select id="product_categorie" name="catagory_id" class="form-control">
                                            <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
                                            @foreach ($catagories as $catag)
                                                <option value="{{ $catag['id'] }}">{{ $catag['catagory_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <input id="approuved_by" name="service_list_by" class="form-control input-md"
                                            required value="{{ Auth::user()->name }}" type="text" hidden>
                                    </div>
                                </div>

                                <!-- File Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="filebutton">Main_image</label>
                                    <div class="col-md-4">
                                        <input id="filebutton" name="catagory_image" class="input-file" type="file"
                                            value="{{ $catagory->catagory_image }}">{{ $catagory->catagory_image }}
                                    </div>
                                </div>

                                <!-- File Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="filebutton">Ad_Banner</label>
                                    <div class="col-md-4">
                                        <input id="filebutton" name="ad_banner" class="input-file" type="file"
                                            value="{{ $catagory->ad_banner }}">{{ $catagory->ad_banner }}
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <button type="submit" id="singlebutton" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
