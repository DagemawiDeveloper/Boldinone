<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Shop\OrderProduct;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        $count = OrderProduct::where('status', '=', 'paid')->count();
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions', 'count'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    Public function store(Request $request) {

        $validated = $request->validate(['permission_name' => ['min:3']]);
        Permission::create($validated);
        
        return to_route('admin.permissions.index')->with('message', 'New Permission Added');

    }

    public function edit(Permission $permission){
        $count = OrderProduct::where('status', '=', 'paid')->count();
        return view('admin.permissions.edit', compact('permission', 'count'));
    }

    public function update(Request $request, Permission $permission) {
        $validated = $request->validate(['permission_name' => ['min:3']]);
        $permission->update($validated);
        
        return to_route('admin.permissions.index')->with('message', 'New Permission Updated');
    }

    public function destroy(Permission $permission){
        $permission->delete();
        return to_route('admin.permissions.index')->with('message', 'Permission Deleted');
    }

}