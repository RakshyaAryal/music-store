<?php

namespace App\Http\Controllers\Admin;

use App\Libraries\Permission;
use App\Role;
use App\RolePermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.permission.index', compact('roles', 'permissions'));
    }

    public function update(Request $request)
    {
        $roles_permission_slug = $request->get('roles_permission_slug');

        RolePermission::truncate();
        foreach ($roles_permission_slug as $item) {

            $roles_permission_slug_arr = explode('|', $item);
            $input['role_id'] = $roles_permission_slug_arr[0];
            $input['permission_slug'] = $roles_permission_slug_arr[1];
            RolePermission::create($input);

        }

        $request->session()->flash('flash_message', 'Permissions are successfully saved');

        return redirect('admin/permission');
    }
}
