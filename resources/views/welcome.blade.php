<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Star Wars Info</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">

            @if (count($films)):
                <ul>
                @foreach($films as $film)
                    <li>{{$film}}</li>
                @endforeach  
                </ul>
            @endif
        </div>
    </body>
</html>
