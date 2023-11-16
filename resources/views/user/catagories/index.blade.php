@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
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
            <h1 class="h3 mb-0 text-gray-800">Add Catagories</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        
            <a href="{{route('user.catagories.create')}}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>

            <div class="col-12 col-sm-8 col-lg-8">
                <h6 class="text-muted">All catagories with their Images</h6> 
                <ul class="list-group">
                    @unless (count ($catagories) == 0)
                    @foreach ($catagories as $catagory)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$catagory->catagory_name}}
                    <small>{{$catagory->catagory_description}}</small>
                    <div class="image-parent">
                        <img src="{{ $catagory->catagory_image ? asset('storage/' . $catagory->catagory_image) : asset('/images/no-image.jpg')}}" class="img-fluid" alt="quixote" width="75" height="75">
                    </div>
                    <div class="image-parent overlay">
                    {{-- <x-user.catagories.editdelete /> --}}
                    <div class="card-img-overlay">

                        <a href="{{route('user.catagories.edit', $catagory->id) }}" class="btn btn-success btn-icon-split float-right m-1">
                            <span class="icon text-white-50">
                                <i class="fa fa-pen" style="color: #ffffff;"></i>
                            </span>
                        </a>
                        <form method="POST" action="{{ route('user.catagories.destroy', $catagory->id)}}"
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
                    </li>
                    @endforeach
                    @else
                   <h3 class="catagory_text"> No Catagories Found!</h3>
                    @endunless
                </ul>
            </div>
        </div>
</div>

@endsection