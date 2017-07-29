@extends('layouts.master')
@section('content')
    <h1>Music Details</h1>
<div>
    <div>Artist:{{$music->artist }}</div>
    <div>Album Name:{{$music->album_name}}</div>
    <div>Generes:{{$music->generes}}</div>
    <div>Music Description:{{$music->music_description}}</div>
    <div>Price:{{$music->price}}</div>
    <div>Image:<img src="{{ url('uploads/'.$music->image) }}"></div>
</div>
    @endsection