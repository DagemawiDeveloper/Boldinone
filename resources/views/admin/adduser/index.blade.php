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
            <h1 class="h3 mb-0 text-gray-800">Add User</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        
            <a href="{{route('admin.adduser.invite')}}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>

                <x-admin.adduser.adduser />
        <div class="col-xl-5 col-md-6 mb-2">
            <table class="table table-striped">
                <x-admin.adduser.adduserstable />
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="#"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">
                            Delete</a>
                        </td>
                    </tr>
                     @endforeach            
                </tbody>
            </table>
        </div>


    </div>
</div>

@endsection