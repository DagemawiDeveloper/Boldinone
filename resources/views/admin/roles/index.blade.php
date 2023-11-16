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
            <h1 class="h3 mb-0 text-gray-800">Add Roles</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>

         <x-admin.roles.roles />
        <div class="col-xl-5 col-md-6 mb-2">
            <table class="table table-striped">
                <x-admin.roles.rolestable />
                <tbody>
                    @unless (count($roles)==0)

                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role['id'] }}</td>
                                <td>{{ $role['role_name' ]}}</td>
                                <td>
                                    <a href="{{ route('admin.roles.edit', $role->id)}}" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <form method="POST"
                                    action="{{ route('admin.roles.destroy', $role->id) }}"
                                    onsubmit="return confirm('Are you sure?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-30">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </button>
                                    </form>
                                </td>
                            </tr>            
                        @endforeach

                    @else
                    <p>No permission listed</p>
                    
                    @endunless
                </tbody>
            </table>
    </div>

    </div>
</div>

@endsection