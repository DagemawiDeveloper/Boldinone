@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
{{-- @extends('layouts.user.service') --}}
@extends('layouts.admin.footer')
@section('title', 'Kaffe Mini | Admin')

@section('content')

<x-admin.dashboard.nav />
 <!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <x-admin.dashboard.flash />
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ads</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        
            <a href="{{route('admin.adevert.create')}}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>

                
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <br>
                            @foreach($list as $lists)
                            <div class="multi-carousel-item">
                                <div class="image-parent">
                                        {{-- <img src="{{ $lists->ads_image ? asset('storage/' . $lists->adevert) : asset('img/error/no-image.jpg') }}" alt="No image" /> --}}
                                        <img src="{{ asset('storage/' . $lists->ads_iamge) }}" />
                                        <a href="{{ route ('admin.adevert.edit', $lists->id)}}" class="btn btn-success btn-icon-split float-right m-1">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-pen" style="color: #ffffff;"></i>
                                            </span>
                                        </a>
                                        <form method="POST" action="{{ route ('admin.adevert.destroy', $lists->id) }}"
                                            onsubmit="return confirm('Are you sure?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon-split float-right m-1">
                                                <span class="icon text-white-30">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        </form>

                                </div>
                            </div>
                            <br>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>

@endsection