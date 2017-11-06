@extends('layouts.master')
@section('content')
    <h1>Add Roles</h1>

    <form action="{{url('admin/roles/store/'.$roles->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group">
            <label>Roles Name</label>
            <input type="text" name="role_name" value="{{ $roles->role_name }}" class="form-control">
        </div>


        <input type="submit" name="submit" class="btn btn-success">

    </form>

@endsection


