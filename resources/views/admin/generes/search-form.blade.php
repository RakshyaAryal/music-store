@extends('layouts.front-master')

@section('content')
    <input type="text" name="music_name" id="music_name" autocomplete="off">
    <div id="search-result"></div>

    <script>
        $(document).ready(function () {

            $("#music_name").keyup(function () {

                var music_name = $("#music_name").val(); //document.getElementById('music_name')
                $.ajax({
                    url: '{{url('generes/ajax-search')}}',
                    type: 'get',
                    data: {
                        mname: music_name,
                        genre: 'Rock'
                    },
                    success: function (response) {
                        $("#search-result").html(response);
                    }
                });
            });


        });

    </script>
@stop