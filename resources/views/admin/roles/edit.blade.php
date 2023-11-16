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
        <a href="{{ route ('admin.roles.index') }}" class="px-4 py-2 btn btn-light"><i class="fa fa-arrow-left p-1"></i>Back</a>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update roles</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
    
        <div class="col-xl-5 col-md-6 mb-2">
            <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                <label for="exampleInputEmail1">edit roles name</label>
                <input type="text" name="role_name" value="{{ $role->role_name}}"
                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <label for="Assign"><i class="fa-regular fa-circle-info"></i><small class="font-weight-bold p-3">Assigne permission to Role({{$role->role_name}})</small></label>
        <div class="col-xl-5 col-md-6 mb-2">
            <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                @csrf
                <div class="form-group border p-4">
                    <div class="row">
                        <select name="permissions[]" class="col-md-12 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full " multiple>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}" @selected($role->hasPermission($permission->permission_name))>
                                    {{ $permission->permission_name }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                </div>
                <div class="form-group border p-4">
                    @foreach($role->permissions as $rp)
                        <div class="row">
                            <span class="border rounded-pill p-2 m-2 b-2"><i class="fa fa-check m-1"></i>{{$rp->permission_name}}</span>
                        </div>
                    @endforeach
                </div>
                <small class="font-weight-bold">Selected for {{$role->role_name}}</small>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Assign Permission</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection