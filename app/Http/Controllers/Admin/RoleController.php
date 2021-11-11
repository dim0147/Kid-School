<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::query()->with('permissions')->get();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role, query all permissions to choose for assign to role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Create new role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'permissions' => 'array',
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->permissions != null) {
            $permissions = Permission::query()->findMany($request->permissions);
            $role->syncPermissions($permissions);
        }


        return back()->with('success', 'Create ' . '\'' . $request->name . '\'' . ' role successfully');
    }

    /**
     * Show the form for editing the role, query all permissions and permissions
     * that this role currently have.
     *
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        $rolePermissions = $role->permissions()->get();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified role, if the $request->permissions is null mean revoke all permissions,
     * if not null then set the newly permissions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'permissions' => 'array',
        ]);

        $role->name = $request->name;

        if ($request->permissions == null) {

            // Remove all permission
            $role->syncPermissions();
        } else {

            // Apply new permission list
            $permissions = Permission::query()->findMany($request->permissions);
            $role->syncPermissions($permissions);
        }

        $role->save();

        return back()->with('success', 'Edit ' . '\'' . $request->name . '\'' . ' role successfully');
    }

    /**
     * Remove the specified role.
     *
     * @param  Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('success', 'Remove role ' . '\'' . $role->name . '\' successfully');
    }
}
