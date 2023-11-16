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
            <h1 class="h3 mb-0 text-gray-800">Add Slide</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        
            <a href="{{route('admin.slide.create')}}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>

                {{-- <x-user.service.create /> --}}
    <div id="content">
    <div class="m-2 p-2">
        <a href="{{ route ('admin.slide.index') }}" class="px-4 py-2 btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-auto">
            <form method="POST" action="{{ route ('admin.slide.store') }}" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <fieldset>

                    <!-- File Button --> 
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">Slide_banner</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="slide_image" class="input-file" type="file">
                    </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name">Title</label>  
                    <div class="col-md-4">
                    <input id="title" name="title" placeholder="Title"
                        class="form-control input-md" required type="text">
                    <input type="color" name="title_color">     
                    </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="catagory">CATEGORY</label>
                    <div class="col-md-4">
                        <select id="catagory" name="catagory" class="form-control">
                            <option value="">Catagories</option>  
                            @foreach ($catagories as $catagory)
                                <option value="{{ $catagory['catagory_name' ] }}">{{ $catagory['catagory_name'] }}</option>   
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <div class="col-md-4">
                    <input id="approuved_by" name="list_by"  class="form-control input-md"
                    required value="{{ Auth::user()->name }}" type="text" hidden>
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name">Subject</label>  
                    <div class="col-md-4">
                    <input id="product_price" name="subject" placeholder="Subject"
                        class="form-control input-md" required type="text">
                    <input type="color" name="subject_color">    
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name">Description</label>  
                    <div class="col-md-4">
                    <textarea class="form-control" name="promote_des" required></textarea>
  
                    </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-4">
                            <button type="submit" id="singlebutton" class="btn btn-primary">
                                Add Slide
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