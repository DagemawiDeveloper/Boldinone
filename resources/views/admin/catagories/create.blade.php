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
                <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
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
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="col-auto">
                        <form method="POST" action="{{ route('admin.catagories.store') }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="catagories_name">CATEGORIES NAME</label>
                                    <div class="col-md-4">
                                        <input type="text" id="product_name" name="catagory_name"
                                            class="form-control input-md" required>

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
                                        <input id="filebutton" name="catagory_image" class="input-file" type="file">
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <button type="submit" id="singlebutton" class="btn btn-primary">
                                            Create
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
