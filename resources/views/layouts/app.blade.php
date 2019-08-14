<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Star Wars Info</title>
        <!-- Semantic UI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
        <link rel="icon" type="image/png" href="{{ asset('/public/css/favoicon') }}">

    </head>
    <body style="text-align:center;" onload="handlePageReload()">
        <div class="ui container" style="padding-top:2em;padding-bottom:2em">
            @yield('header')
            @yield('navbar') {{-- Only on film Info page --}}
            @yield('searchBar')  {{-- Only on film list page --}}
            @yield('content')
        </div>
        {{-- put javascript in footer section, this section is only for HOMEPAGE --}}
        @yield('footer')

    </body>
</html>
