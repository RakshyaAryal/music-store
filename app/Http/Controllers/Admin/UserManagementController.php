<?php

namespace App\Http\Controllers\Admin;

use App\AdminUserAccess;
use App\Libraries\AccessListLibrary;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserManagementController extends Controller
{
    Public function index()
    {
        $user_management = User::all();
        return view('admin.user_management.index', compact('user_management'));
    }

    Public function create()
    {
        $accessList = AccessListLibrary::accessList();

        $user_management = new User();
        return view('admin.user_management.create', compact('user_management', 'accessList'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
        ]);
        $input = $request->all();

        if ($request->has('password')) {
            $input['password'] = bcrypt($input['password']);
        }
        $admin_user = User::create($input);

        $this->updateAccess($admin_user->id, $request);

        $request->session()->flash('flash_message', 'Admin is successfully added!');
        return redirect('admin/user_management');

    }

    public function delete($id, Request $request)
    {
        $user_management = User::findorfail($id);
        $user_management->delete();
        $request->session()->flash('flash_message', 'Admin deleted successfully!');
        return redirect('admin/user_management');
    }

    public function edit($id)
    {
        $accessList = AccessListLibrary::accessList();
        $user_management = User::findorfail($id);
        return view('admin.user_management.create', compact('user_management', 'accessList'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|max:255|unique:users,email,'.$id,
        ]);
        $input = $request->all();
        $user_management = User::findorfail($id);

        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            unset($input['password']);
        }


        $user_management->fill($input)->save();

        $this->updateAccess($id, $request);

        $request->session()->flash('flash_message', 'User updated successfully!');
        return redirect('admin/user_management');
    }

    public function view($id)
    {
        $user_management = User::findorfail($id);
        return view('admin.user_management.view', compact('user_management'));
    }

    public function updateAccess($id, Request $request)
    {
        $input['admin_user_id'] = $id;
        AdminUserAccess::where('admin_user_id', $id)->delete();
        $userAccessArr = $request->get('admin_user_access');
        if (count($userAccessArr) > 0) {
            foreach ($userAccessArr as $userAccess) {
                $input['module'] = $userAccess;
                AdminUserAccess::create($input);
            }
        }


    }
}
