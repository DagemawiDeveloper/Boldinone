@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
@extends('layouts.admin.footer')
@section('title', 'Felagi')

@section('content')

<x-admin.dashboard.nav />
 <!-- Main Content -->
<div id="content">
    <div class="flex m-2 p-2">
        <a href="{{ route ('admin.adduser.index') }}" class="px-4 py-2 btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Invite user by email</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
    
        <div class="col-xl-5 col-md-6 mb-2">
            <form method="POST" action="{{ route ('admin.adduser.invite') }}">
                @csrf
                <div class="form-group">
                <label for="exampleInputEmail1">User email</label>
                <input type="text" name="email"
                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">send</button>
            </form>
        </div>
    </div>
</div>

@endsection