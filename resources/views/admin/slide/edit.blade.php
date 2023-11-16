@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
{{-- @extends('layouts.user.service') --}}
@extends('layouts.admin.footer')
@section('title', 'SayatCart | Slide')

@section('content')

    <x-admin.dashboard.nav />
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <x-admin.dashboard.flash />
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Slide </h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            <a href="{{ route('admin.slide.create') }}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>

            {{-- <x-user.service.create /> --}}
            <div id="content">
                <div class="m-2 p-2">
                    <a href="{{ route('admin.slide.index') }}" class="px-4 py-2 btn btn-light"><i
                            class="fa fa-arrow-left"></i> Back</a>
                </div>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <form method="POST" action="{{ route('admin.slide.update', $slide->id) }}"
                        enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <div class="card shadow-lg" style="padding: 2rem; margin: 1rem;">
                                <div class="card-body">
                                    <div class="form-row">
                                        <!-- Text input-->
                                        <div class="form-group col-md-6">

                                            <br>
                                            <label for="filebutton">Slide_banner</label>
                                            <input id="filebutton" name="slide_image" class="input-file" type="file"
                                                value="{{ $slide['slide_image'] }}">
                                            {{-- {{ $slide['slide_image' ] }} --}}
                                            <br>
                                            <label for="product_name">Title</label>

                                            <input id="title" name="title" placeholder="Title"
                                                class="form-control input-md" required type="text"
                                                value="{{ $slide['title'] }}">
                                            <input type="color" name="title_color" value="{{ $slide['title'] }}">
                                            <br>
                                            <label for="product_categorie">CATEGORY</label>

                                            <select id="catagory" name="catagory" class="form-control">
                                                <option value="{{ $slide['catagory'] }}" selected>
                                                    {{ $slide['catagory'] }}
                                                </option>
                                                @foreach ($catagories as $catagory)
                                                    <option value="{{ $catagory['catagory_name'] }}">
                                                        {{ $catagory['catagory_name'] }}</option>
                                                @endforeach
                                            </select>



                                            <input id="approuved_by" name="product_list_by" class="form-control input-md"
                                                required value="{{ Auth::user()->name }}" type="text" hidden>



                                            <br>
                                            <label for="product_name">Subject</label>

                                            <input id="product_price" name="subject" placeholder="Subject"
                                                class="form-control input-md" required type="text"
                                                value="{{ $slide['subject'] }}">
                                            <input type="color" name="subject_color"
                                                value="{{ $slide['subject_color'] }}">

                                        </div>
                                        <!-- Text input-->

                                        <div class="form-group col-md-6">
                                            <div class="card shadow-sm">
                                                <div class="card-body" style="background-color: rgb(247 245 245)">
                                                    <label for="product_name" style="color: black">Description</label>

                                                    <textarea class="form-control" name="promote_des" required>
                                                {{ $slide['promote_des'] }}"
                                                </textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <button type="submit" id="singlebutton" class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
