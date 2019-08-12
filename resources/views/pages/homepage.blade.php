@extends('layouts.app')


@section('header')
        <h1 class="ui huge brown header">Star Wars Info</h1>
        <h2 class="ui blue medium header">All the information about Star Wars movies that you should know!</h2>
@stop


@section('searchBar')
{{-- <form method="GET" action="/" onkeydown="this.submit();"> --}}
    {{-- <label>Search:
        <input type='search' name="search" placeholder="by title" /> 
    </label> --}}
    {{-- <button type="submit">Search</button> --}}
{{-- </form> --}}  

    <div class="ui category search">
        <div class="ui icon input">
                <input id="searchInput" class="prompt" type="text" placeholder="Search movies" onKeyUp="handleSearch()">
                <i class="search icon"></i>
        </div>
        <div class="results"></div>
    </div>

@stop


@section('content')
    <ul id="search-field">
        @foreach($orderedFilmsArr as $filmData)
                <div class="ui container">
                    <br />
                    <h3 class="ui dividing violet large header">{{$filmData['title']}}</h3>
                    <h2 class="ui brown medium header">Director: {{$filmData['director']}}</h2>
                    <h2 class="ui brown medium header">Episode: {{$filmData['episode_id']}}</h2>
                    <h2 class="ui brown medium header">Release Date: {{$filmData['release_date']}}</h2>
                    <button class="ui orange basic button">
                        <a href="/film/{{$filmData['episode_id']}}">details</a>
                    </button>
                </div>
        @endforeach  
    </ul>
@stop

@section('footer')
    <script type="text/javascript">
        const handleSearch = () => {
            let input = document.querySelector("input");
            let searchValue = input.value.toUpperCase()
            let ul = document.querySelector('#search-field');
            let ulDiv = ul.getElementsByTagName('div');
            for(let i = 0; i < ulDiv.length; i++) {
                let filmTitle = ulDiv[i].querySelector('h3').innerHTML;
                if (filmTitle.toUpperCase().indexOf(searchValue) === -1) {
                    ulDiv[i].style.display = 'none';
                } else {
                    ulDiv[i].style.display = '';
                }
            }
        }
    </script>
@stop