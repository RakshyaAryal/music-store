@extends('layouts.master')
@section('content')
    <h1>Add Music</h1>

    <form action="{{url('admin/music/store/'.$music->id)}}" method="post">
        {{csrf_field()}}

        <div class="form-group">
            <label>Artist</label>
            <input type="text" name="artist" value="{{ $music->artist }}" class="form-control">
        </div>


        <div class="form-group">
            <label>Album Name</label>
            <input type="text" name="album_name" value="{{ $music->album_name }}" class="form-control">
        </div>





            <div class="form-group">
                <label for="generes_id">Generes</label>
                <select name="" id="generes_id" class="form-control">
                    @foreach( $generes as $genere)
                        <option value="{{ $genere->id }}">{{ $genere->title }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Music Description</label>
                <input type="text" name="music_description" value="{{ $music->music_description }}"
                       class="form-control">
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" value="{{ $music->price }}" class="form-control">
            </div>


            <div class="form-group">
                <label>Image</label>
                <input type="text" name="image" value="{{ $music->image }}" class="form-control">
            </div>


            <input type="submit" name="submit" class="btn btn-success">
        </div>

    </form>
@endsection
