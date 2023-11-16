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
                <h1 class="h3 mb-0 text-gray-800">Slide</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            <a href="{{ route('admin.slide.create') }}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>


            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <br>
                    <div class="banner_slide">
                        @foreach ($slidelist as $slide)
                            <div class="multi-carousel-item">

                                <div class="image-parent shadow p-3 bg-white rounded overlay">

                                    <a href="{{ route('admin.slide.edit', $slide->id) }}"
                                        class="btn btn-success float-right m-1"
                                        style="background-color: unset; border: unset;">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-pen" style="color: green;"></i>
                                        </span>
                                    </a>
                                    <form method="POST" action="{{ route('admin.slide.destroy', $slide->id) }}"
                                        onsubmit="return confirm('Are you sure?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger float-right m-1"
                                            style="background-color: unset; border: unset; color:red;">
                                            <span class="icon text-white-20">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </form>
                                    <img src="{{ $slide->slide_image ? asset('storage/' . $slide->slide_image) : asset('img/error/no-image.jpg') }}"
                                        class="image-parent w-100" />

                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection
