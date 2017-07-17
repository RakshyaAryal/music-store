@extends('layouts.front-master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div>Artist: {{$item->artist}}</div>
            <div>Generes: {{$item->generes}}</div>
            <div>Music Description: {{$item->music_description}}</div>
            <div>Price: {{$item->price}}</div>
            <div>Image: {{$item->image}}</div>
            <div>Date: {{$item->created_at}}</div>
        </div>
    </div>
@stop