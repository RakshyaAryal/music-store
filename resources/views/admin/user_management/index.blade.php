@extends('layouts.master')
@section('content')

    <a href="{{url('admin/user_management/create')}}" class="btn btn-primary pull-right">+Add</a>
    <table class="table table-bordered" id="music-table">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td style="width: 220px">Action</td>
        </tr>
        @if(count($user_management) > 0)

            @foreach($user_management as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{$item->name}}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ URL::to('admin/user_management/'.$item->id.'/delete') }}" class="btn btn-danger">Delete</a>
                        <a href="{{URL::to('admin/user_management/'.$item->id.'/view')}}" class="btn btn-primary">View</a>
                        <a href="{{URL::to('admin/user_management/'.$item->id.'/edit')}}" class="btn btn-success">Edit</a>
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
        $("#music-table").dataTable({
            "pageLength": 5
        });
    </script>
@endsection