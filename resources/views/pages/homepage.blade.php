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
                <div class="ui container filmItem" >
                    <br />

                    <h3 class="ui dividing violet large header">{{$filmData['title']}}</h3>
                    <div class="alert-box favoed">You favourited this film !!!</div>
                    <div class="alert-box unfavoed">You unfavourited this film !!!</div>
                    <h2 class="ui brown medium header">Director: {{$filmData['director']}}</h2>
                    <h2 class="ui brown medium header">Episode: {{$filmData['episode_id']}}</h2>
                    <h2 class="ui brown medium header">Release Date: {{$filmData['release_date']}}</h2>

                    <label >
                        <h4 class="ui medium red header">Favourite
                        <input type="checkbox" id="{{$filmData['title']}}" class="checkbox" onClick="handleFavo(this.id)" />
                        </h4>
                    </label>

                    <button class="ui orange basic button">
                        <a href="/film/{{$filmData['episode_id']}}">details</a>
                    </button>
                </div>
        @endforeach  
    </ul>
@stop


@section('footer')
    <script type="text/javascript" >

        const handleSearch = () => {
            let input = document.querySelector("input");
            let searchValue = input.value.toUpperCase()
            let ul = document.querySelector('#search-field');
            let filmItem = ul.getElementsByClassName('filmItem');
            for(let i = 0; i < filmItem.length; i++) {
                let filmTitle = filmItem[i].querySelector('h3').innerHTML;
                if (filmTitle.toUpperCase().indexOf(searchValue) === -1) {
                    filmItem[i].style.display = 'none';
                } else {
                    filmItem[i].style.display = '';
                }
            }
        }

        const handleFavo = (checkBoxID) => {
            let checkbox = document.getElementById(checkBoxID);
            if(checkbox.checked) {
                window.localStorage.setItem(checkBoxID,'favourited');
            } else {
                window.localStorage.removeItem(checkBoxID);
            }
            console.log(window.localStorage);
        }


        const handleFavoCheckBoxReload = () => {
            let checkboxes = document.getElementsByClassName('checkbox');
            let locolStoreKeys = Object.keys(window.localStorage);
            if (locolStoreKeys.length !== 0) {
                for(let i = 0; i < checkboxes.length; i++) {
                    if(locolStoreKeys.includes(checkboxes[i].id)) {
                        checkboxes[i].checked = true;
                    }
                }
            }
        }
    </script>
@stop