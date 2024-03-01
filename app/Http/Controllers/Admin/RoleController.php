<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['Super Admin', 'Admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        if (!$validated) {
            Role::create($validated);
            return to_route('admin.roles.index')->with('message', 'Added Successful');
        }
        return to_route('admin.roles.index')->with('message', 'Role Exists');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Role $role, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);
        $role->update($validated);

        return to_route('admin.roles.index')->with('message', 'Edit Successful');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('message', 'Delete Successful');
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission Already Assigned');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission Assigned');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission Revoked');
        }
        return back()->with('message', 'No Permission');
    }
}
