@extends('layouts.master')
@section('content')

    <a href="{{url('admin/roles/create')}}" class="btn btn-primary pull-right">+Add</a>
    <table class="table table-bordered" id="roles-table">
        <thead>
        <tr>
            <td>#</td>
            <td>Roles Name</td>
            <td style="width: 220px">Action</td>
        </tr>
        </thead>
        @if(count($roles) > 0)

            @foreach($roles as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{$item->role_name}}</td>
                    <td>
                        <a href="{{ URL::to('admin/roles/'.$item->id.'/delete') }}" class="btn btn-danger">Delete</a>
                        <a href="{{URL::to('admin/roles/'.$item->id.'/view')}}" class="btn btn-primary">View</a>
                        <a href="{{URL::to('admin/roles/'.$item->id.'/edit')}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>

            @endforeach
        @else
            <tr>
                <td colspan="8">No Record Found</td>
            </tr>
        @endif
    </table>
    {{-- {{ $music->links() }}--}}
@stop
@section('scripts')
    <script>
        $("#roles-table").dataTable({
            "pageLength": 10
        });

        function DeleteConfirm() {
            var isDelete = confirm('Are you sure want to delete?');

            if(isDelete) {
                return true;
            } else {
                return false;
            }

        }
    </script>
@endsection































