<html>
<head>
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
<div class="container-fluid music-header">
    Music
</div>

<div class="container-fluid" style="background-color: #8eb4cb">
    <div class="row" style="width: 80%; margin: 0 auto;">
    <div class="row">
        <div class="col-md-12" style="">
            @yield('content')
        </div>

        <h2>Generes</h2>

        <ul>
            @foreach($generes as $genere)
                <li><a href="{{ url('genere/'.$genere->title.'/'.$genere->id) }}">{{$genere->title}}</a>
                
                </li>

            @endforeach
        </ul>


    </div>

</div>
    </div>
<div class="container-fluid" style="">

</div>

</body>
</html>