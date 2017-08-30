@extends('layouts.master')
@section('content')
    <h1>Add Music</h1>

    <form action="{{url('admin/music/store/'.$music->id)}}" method="post" enctype="multipart/form-data">
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
                <select name="generes" id="generes_id" class="form-control">
                    @foreach( $generes as $genere)
                        <option value="{{ $genere->id }}">{{ $genere->title }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Music Description</label>
                <textarea name="music_description" class="form-control">{{ $music->music_description }}</textarea>

            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" value="{{ $music->price }}" class="form-control">
            </div>


            <div class="form-group">
                <label>Image</label>
                <img src="{{ url('uploads/'.$music->image) }}" height="200">
                <input type="file" name="image" class="form-control" onchange="previewFile()">
            </div>


            <input type="submit" name="submit" class="btn btn-success">
        </div>

    </form>
    <script>


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

    </script>
@endsection
