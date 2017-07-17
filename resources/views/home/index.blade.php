@extends('layouts.front-master')

@section('content')
    <div class="row form-inline" style="height: 50px;">
        <form action="{{ url('music/search') }}">
            <div class="form-group">
                <input type="text" name="music_name" class="form-control">
                <input type="submit" value="Search" class="btn btn-success">
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        @foreach($music as $item)

            <div class="col-md-3" style="background: white; margin: 5px;">
                <img src="https://assets.pcmag.com/media/images/516972-apple-music.png?thumb=y" width="245"/>
                <h2><a href="{{ url('single-music/'.$item->id) }}">{{$item->album_name }}</a></h2>
                <div>Artist: {{$item->artist}}</div>
                <div>Generes: {{$item->generes}}</div>
                <div>Image: {{$item->image}}</div>
                <div>Date: {{$item->created_at}}</div>
                <div>
                    <a href="{{ url('single-music/'.$item->id) }}"
                       class="btn btn-success btn-block">${{$item->price}} Buy</a></div>
                <br/>

            </div>

        @endforeach
    </div>
    {{ $music->links() }}


@stop