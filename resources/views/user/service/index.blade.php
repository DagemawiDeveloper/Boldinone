@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
{{-- @extends('layouts.user.service') --}}
@extends('layouts.admin.footer')
@section('title', 'Felagi')

@section('content')

<x-admin.dashboard.nav />
 <!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <x-admin.dashboard.flash />
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Services</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        
            <a href="{{route('user.service.create')}}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>

                
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="card-columns">
                            @unless (count ($list_service) == 0)
                            @foreach ($list_service as $service)
                                <div class="card">
                                <img src="{{asset('img/service/massage.jpg')}}" class="card-img-top" alt="...">
                                {{-- <x-user.service.editdelete /> --}}

                                <div class="card-img-overlay">
                                    <a href="{{route('user.service.edit', $service->id)}}" class="btn btn-success btn-icon-split float-right m-1">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-pen" style="color: #ffffff;"></i>
                                        </span>
                                    </a>
                                    <form method="POST" action="{{route('user.service.destroy', $service->id)}}"
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

                                <div class="card-body">
                                    <h5 class="card-title">{{ $service['service_name' ] }}</h5>
                                    <p class="card-text">{{ $service['service_description' ] }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $service['service_catagories' ] }}</small></p>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <h3 class="service_text">No service listed!</h1>
                            @endunless
                        </div>
                    </div>
                </div>

    </div>
</div>

@endsection