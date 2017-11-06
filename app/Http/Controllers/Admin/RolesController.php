<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    Public function index()
    {
        //$title = "Roles";
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    Public function create()
    {
        $roles = new Role();
        return view('admin.roles.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            //'name' => 'required',
        ]);
        $input = $request->all();
        Role::create($input);
        $request->session()->flash('flash_message', 'Roles is successfully added!');
        return redirect('admin/roles');

    }

    Public function delete($id, Request $request)
    {
        $roles = Role::findorfail($id);
        $roles->delete();
        $request->session()->flash('flash_message', 'Roles deleted successfully!');
        return redirect('admin/roles');
    }

    public function edit($id)
    {
        $roles = Role::findorfail($id);
        return view('admin.roles.create', compact('roles'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            //'name' => 'required',
        ]);
        $input=$request->all();
        $roles = Role::findorfail($id);
        $roles->fill($input)->save();
        $request->session()->flash('flash_message', 'Roles updated successfully!');
        return redirect('admin/roles');
    }

    public function view($id)
    {
        $roles = Role::findorfail($id);
        return view('admin.roles.view', compact('roles'));
    }

}
