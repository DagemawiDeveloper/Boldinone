<?php

namespace App\Http\Controllers\Admin;


use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Shop\OrderProduct;
use App\Http\Controllers\Controller;



class RoleController extends Controller
{
    public function index()
    {
        $count = OrderProduct::where('status', '=', 'paid')->count();
        // $roles = Role::all(); to fetch all users
        // $roles = Role::whereNotIn('role_name', ['admin'])->get(); //this one to list all except admin
        $roles = Role::whereNotIn('role_name', ['admin'])->orderBy('id')->get();
        return view('admin.roles.index', compact('roles', 'count'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }
    
    Public function store(Request $request) {
        $validated = $request->validate(['role_name' => ['min:3']]);
        Role::create($validated);
        return to_route('admin.roles.index')->with('message', 'New Role Added');
    }

    
    public function edit(Role $role){
        $permissions = Permission::all();// for select all permission /edit
        $count = OrderProduct::where('status', '=', 'paid')->count();
        return view('admin.roles.edit', compact('role', 'permissions', 'count'));
    }

    public function update(Request $request, Role $role) {
        $validated = $request->validate(['role_name' => ['min:3']]);
        $role->update($validated);
        
        return to_route('admin.roles.index')->with('message', 'New Role Updated');
    }

    public function destroy(Role $role){
        $role->delete();
        return to_route('admin.roles.index')->with('message', 'Role Deleted');
    }

    
    public function assignPermissions(Request $request, Role $role){
        $role->permissions()->sync($request->permissions);
        return back()->with('message', 'Permissions added');
        
    } 
}