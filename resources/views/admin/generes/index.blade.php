@extends('layouts.master')

@section('content')
    <h1>Generes</h1>
    <a href="{{url('admin/generes/create')}}" class="btn btn-primary pull-right">+Add</a>
    <br>
    <br>

    <table class="table table-bordered">
        <tr>
            <td>#</td>
            <td>Title</td>
            <td>Action</td>
        </tr>
        @if(count($generes) > 0)
            @foreach($generes as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>
                        <a href="{{URL::to('admin/generes/'.$item->id.'/delete')}}" class="btn btn-danger"
                           onclick="return DeleteConfirm()">Delete</a>
                        <a href="{{URL::to('admin/generes/'.$item->id.'/edit')}}" class="btn btn-primary">Edit</a>
                        <a href="{{URL::to('admin/generes/'.$item->id.'/view')}}" class="btn btn-success">View</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">No record found</td>
            </tr>

        @endif

    </table>

    <script>
        function DeleteConfirm() {
            var isDelete = confirm('Are you sure want to delete?');

            if (isDelete) {
                return true;
            } else {
                return false;
            }

        }
    </script>
@stop