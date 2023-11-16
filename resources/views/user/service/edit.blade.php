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
            <h1 class="h3 mb-0 text-gray-800">Edit service</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        
            <a href="{{route('user.service.create')}}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>

                {{-- <x-user.service.create /> --}}
            <div id="content">
            <div class="m-2 p-2">
                <a href="{{ route ('user.service.index') }}" class="px-4 py-2 btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="col-auto"> 
                    <form method="POST" action="{{ route ('user.service.update', $service->id) }}" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
                            <div class="col-md-4">
                            <input id="product_name" name="service_name" placeholder="PRODUCT NAME"
                             class="form-control input-md" required="" type="text" value="{{ $service->service_name}}">
                                
                            </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
                            <div class="col-md-4">
                                <select id="product_categorie" name="service_catagories" class="form-control">
                                    <option value="{{ $service->service_catagories}}" selected>{{ $service->service_catagories}}</option>  
                                    @foreach ($catagories as $catagory)
                                        <option value="{{ $catagory['catagory_name' ] }}">{{ $catagory['catagory_name' ] }}</option>   
                                    @endforeach
                                </select>
                            </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
                            <div class="col-md-4">                     
                                <textarea class="form-control" id="product_description" name="service_description">
                                    {{ $service->service_description}}
                                </textarea>
                            </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                            <div class="col-md-4">
                            <input id="approuved_by" name="service_list_by"  class="form-control input-md"
                            required value="{{ Auth::user()->name }}" type="text" hidden>
                            </div>
                            </div>

                            <!-- File Button --> 
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Main_image</label>
                            <div class="col-md-4">
                                <input id="filebutton" name="main_image" class="input-file" type="file"
                                value="{{ $service->main_image}}">
                                {{ $service->banner_image}}
                            </div>
                            </div>
                            <!-- File Button --> 
                            <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Banner_image</label>
                            <div class="col-md-4">
                                <input id="filebutton" name="banner_image" class="input-file" type="file"
                                 value="{{ $service->banner_image}}">
                                {{ $service->banner_image}}
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