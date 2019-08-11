<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Star Wars Info</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="icon" type= "image/png" href="favicon.png">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron"> 
                @yield('header')
            </div>
            @yield('navbar') {{-- Only on film Info page --}}
            @yield('searchBar')  {{-- Only on film list page --}}
            @yield('content')
        </div>
    </body>
</html>
