<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        if (!$validated) {
            Permission::create($validated);
            return to_route('admin.permissions.index')->with('message', 'Permission Added');
        }
        return to_route('admin.permissions.index')->with('message', 'Permission Already Exists');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Permission $permission, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);
        $permission->update($validated);

        return to_route('admin.permissions.index')->with('message', 'Update Successful');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('message', 'Delete Successful');
    }
}
