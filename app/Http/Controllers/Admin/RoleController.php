<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Resturant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('Admin.roles.add_role', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::all();
        return view('Admin.roles.create_role', compact('permission'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.role.index')
            ->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('Admin.roles.show_role', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        // dd(254346);
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('Admin.roles.edit_role', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.role.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        // dd(34536);
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('admin.role.index')
            ->with('success', 'Role deleted successfully');
    }

    // public function registerview()
    // {
    //     $role = Role::all();
    //     return view('Admin.roles.add_sub_admin', compact('role'));
    // }
    // public function registersubadmin(Resturant $request)
    // {
    //     dd(456347);
    //     $role = new Admin;
    //     $role->name = $request->name;
    //     $role->email = $request->email;
    //     $role->password = Hash::make($request->password);
    //     $role->save();
    //     return redirect()->back();
    // }
}
