<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Star Wars Info</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="container">
                <div class="jumbotron">
                    <div class="container">
                        <h1 class="center">Star Wars Info</h1>
                        <p>All the information about Star Wars movies that you should know!</p>
                    </div>
                </div>
            <ol>
                @foreach($filmsDataArr as $filmData)
                    <li>
                        <h3>{{$filmData['title']}}</h3>
                        <p>Director: {{$filmData['director']}}
                        <p>Release Date: {{$filmData['release_date']}}</p>
                        <a href="#">details</a>
                    </li>
                @endforeach  
            </ol>
        </div>
    </body>
</html>
