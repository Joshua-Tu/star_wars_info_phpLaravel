<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Star Wars Info</title>
        <!-- Semantic UI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
        <link rel="icon" type= "image/png" href="favicon.png">
        <style>
            .tooltip {
              position: relative;
              display: inline-block;
              border-bottom: 1px dotted black;
            }

            .tooltip .tooltiptext {
              visibility: hidden;
              width: 180px;
              background-color: black;
              color: #fff;
              text-align: left;
              border-radius: 6px;
              padding: 5px 0;
            
              /* Position the tooltip */
              position: absolute;
              z-index: 1;
            }

            .tooltip:hover .tooltiptext {
              visibility: visible;
            }
            </style>
    </head>
    <body style="text-align:center;">
        <div class="ui container" style="padding-top:2em;padding-bottom:2em">
            @yield('header')
            @yield('navbar') {{-- Only on film Info page --}}
            @yield('searchBar')  {{-- Only on film list page --}}
            @yield('content')
        </div>
    </body>
</html>
