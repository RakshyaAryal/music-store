@extends('layouts.front-master')

@section('content')
    <button type="button" id="ajax-button">Get Ajax data</button>

    <div id="my-data"></div>

    <script>
        $(document).ready(function () {

            $("#ajax-button").click(function () {

                $.ajax({
                    url: "{{ url("generes/get-details") }}",
                    type: "get",
                    success: function (response) {
                        $("#my-data").html(response);


                    }
                });

            });

        });

    </script>

@stop