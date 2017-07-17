@extends('layouts.master')
@section('content')

    <a href="{{url('admin/music/create')}}"class="btn btn-primary pull-right">+Add</a>
<table class="table table-bordered">
    <tr>
        <td>#</td>
        <td>Artist</td>
        <td>Album Name</td>
        <td>Generes</td>
        <td>Music Description</td>
        <td>Price</td>
        <td>Image</td>
        <td style="width: 220px">Action</td>
    </tr>

    @foreach($music as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{$item->artist}}</td>
            <td>{{ $item->album_name }}</td>
            <td>{{$item->generes}}</td>
            <td>{{$item->music_description}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->image}}</td>
            <td>
                <a href="{{ URL::to('admin/music/'.$item->id.'/delete') }}"class="btn btn-danger">Delete</a>
                <a href="{{URL::to('admin/music/'.$item->id.'/view')}}"class="btn btn-primary">View</a>
                <a href="{{URL::to('admin/music/'.$item->id.'/edit')}}"class="btn btn-success">Edit</a>
            </td>
        </tr>

    @endforeach

</table>
{{ $music->links() }}
    @stop
