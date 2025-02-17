<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class RoleController
{
    public function index(Request $request)
    {
        $roles = Role::get();

        return view('roles.index')
            ->with('roles', $roles);
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:roles,slug'
        ]);

        $input = $request->all();

        Role::create($input);

        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
    }

    public function show($id)
    {
        $role = Role::find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

       
        return view('roles.show')->with('role', $role);
    }

    public function edit($id)
    {
        $role = Role::find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.edit')->with('role', $role);
    }

    public function update($id, Request $request)
    {

        $role = Role::find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $role->update($request->all());

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $role->delete();

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));
    }

    // public function update_permission(Request $request, $id)
    // {
    //     $role = Role::find($id);

    //     if (empty($role)) {
    //         Flash::error('Role not found');

    //         return redirect(route('roles.index'));
    //     }
        
    //      $selectedPermissions = $request->input('permissions', []);

    //      $existingPermissions = $role->permissions->pluck('permission_id')->toArray();

    //     $permissionsToAdd = array_diff($selectedPermissions,$existingPermissions);
    //     $permissionsToRemove = array_diff($existingPermissions,$selectedPermissions);
       
    //     foreach ($permissionsToAdd as $permissionId) {
    //         PermissionRole::create([
    //             'role_id' => $role->id,
    //             'permission_id' => $permissionId
    //         ]);
    //     }

    //     PermissionRole::destroy($permissionsToRemove); 

    //     Flash::success('Permissions updated successfully');

    //     return back();
    // }
}
