@extends('layouts.app')


@section('header')
        <h1 class="ui huge brown header">Star Wars Info</h1>
        <h2 class="ui blue large header">All the information about Star Wars movies you should know !</h2>
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
                <li class="ui container filmItem" >
                    <br />
                    <h3 class="ui dividing violet large header">{{$filmData['title']}}</h3>
                    <div class="alert-box favoed {{$filmData['title']}}">You favourited this film !!!</div>
                    <div class="alert-box unfavoed {{$filmData['title']}}">You unfavourited this film !!!</div>
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
                </li>
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

        const handleFavo = (checkBoxID) => {
            let checkbox = document.getElementById(checkBoxID);
            //two alert box in a film item div, index 0 is for favoed, index 1 is for unfavoed
            let favoedAlertDiv = document.getElementsByClassName(checkBoxID)[0];
            let unFavoedAlertDiv = document.getElementsByClassName(checkBoxID)[1];

            if(checkbox.checked) {
                favoedAlertDiv.style.display = 'block';
                //alert box will be shown for 1.5 seconds
                setTimeout(() => {
                    return favoedAlertDiv.style.display = 'none';
                }, 1500)

                window.localStorage.setItem(checkBoxID,'favourited');
                                
                
                //move the favoed div to the top of the list
                let filmList = document.querySelector('ul');
                // let filmDataDivs = filmList..getElementsByClassName('filmItem');
                // console.log(filmDataDivs.div);

            } else {
                unFavoedAlertDiv.style.display = 'block';
                setTimeout(() => {
                    return unFavoedAlertDiv.style.display = 'none';
                }, 1500)
                window.localStorage.removeItem(checkBoxID);
            }
            //console.log(window.localStorage);
        }

    </script>
@stop