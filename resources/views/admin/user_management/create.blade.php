@extends('layouts.master')
@section('content')
    <h1>Add Users</h1>

    <form action="{{url('admin/user_management/store/'.$user_management->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $user_management->name }}" class="form-control">
        </div>


        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="{{ $user_management->email }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="{{$user_management->password}}" class="form-control">
        </div>

        <div class="form-group">
            <label>Permission</label>

            @php
                $access_array = [];
                if(count($user_management->adminUserAccess) > 0)
                {
                foreach ($user_management->adminUserAccess as $access){
                $access_array[] = $access->module;
                }

                }
            @endphp


            @php($user_management->adminUserAccess = (array)$user_management->adminUserAccess)

           {{-- <div>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" name="admin_user_access[]"
                           value="dashboard" checked onclick="return false;"> Dashboard
                </label>
            </div>--}}

            @foreach($accessList as $accessValue => $accessDescription)
                <div>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" name="admin_user_access[]"
                               value="{{ $accessValue }}"
                               @if(in_array($accessValue,$access_array)) checked @endif> {{ $accessDescription }}
                    </label>
                </div>
            @endforeach
        </div>
        <br>


        <input type="submit" name="submit" class="btn btn-success">
        </div>

    </form>
    {{--<script>


        function previewFile() {
            var preview = document.querySelector('img');//$("img")
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                preview.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }

    </script>--}}
@endsection
