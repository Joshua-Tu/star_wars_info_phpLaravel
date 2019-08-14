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
            <li class="ui container filmItem" id="{{$filmData['episode_id']}}">
                 <br />
                 <h3 class="ui dividing violet large header">{{$filmData['title']}}</h3>
                 <div class="alert-box favoed {{$filmData['title']}}">You favourited this film, this film will go to the top !!!</div>
                 <div class="alert-box unfavoed {{$filmData['title']}}">You unfavourited this film, this film will go to the bottom !!!</div>
                 <h2 class="ui brown medium header">Director: {{$filmData['director']}}</h2>
                 <h2 class="ui brown medium header">Episode: {{$filmData['episode_id']}}</h2>
                 <h2 class="ui brown medium header">Release Date: {{$filmData['release_date']}}</h2>

                 <label >
                     <h4 class="ui medium red header">Favourite
                     <input type="checkbox" id="{{$filmData['title']}}" class="checkbox" onClick="handleFavo(this.id, {{$filmData['episode_id']}})" />
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

        const handlePageReload = () => {
            const checkboxes = document.getElementsByClassName('checkbox');
            const locolStoreKeys = Object.keys(window.localStorage);
            //ul contains an array of li elements
            const ul = document.querySelector('#search-field');
            const lis = ul.getElementsByTagName('li');
            /////////////
            if (locolStoreKeys.length !== 0) {
                for(let i = 0; i < checkboxes.length; i++) {
                    if(locolStoreKeys.includes(checkboxes[i].id)) {
                        checkboxes[i].checked = true;
                    }
                }
            }

            for(let i = 0; i < lis.length; i++) {
                const checkStatus = lis[i].getElementsByTagName('input')[0].checked;
                if(checkStatus) {
                    const checkedLi = lis[i].cloneNode(true);
                    lis[i].remove();
                    ul.insertBefore(checkedLi, ul.childNodes[0]);
                }
            }
        }

        const handleFavo = (checkBoxID, liId) => {
            //Fetch the checkbox
            const checkbox = document.getElementById(checkBoxID);
            //two alert box in a film item div, index 0 is for favoed, index 1 is for unfavoed
            const favoedAlertDiv = document.getElementsByClassName(checkBoxID)[0];
            const unFavoedAlertDiv = document.getElementsByClassName(checkBoxID)[1];
            //////////ul & li are for uplifting the position of checked li elements
            const ul = document.querySelector('#search-field');
            const li = document.getElementById(liId);
            /////////
            if(checkbox.checked) {
                ///////move the favoed div to the top of the list
                //alert box will be disappear in 1.5 seconds
                const favoLi = li.cloneNode(true);
                favoedAlertDiv.style.display = 'block';
                setTimeout(() => {
                    li.remove();
                    ul.insertBefore(favoLi, ul.childNodes[0]);
                    ul.getElementsByClassName(checkBoxID)[0].style.display = 'none';
                }, 1500)
                //added to local storage
                window.localStorage.setItem(checkBoxID,'favourited');

            } else {
                const unfavoLi = li.cloneNode(true);           
                unFavoedAlertDiv.style.display = 'block';
                setTimeout(() => {
                    li.remove();
                    ul.appendChild(unfavoLi);
                    ul.getElementsByClassName(checkBoxID)[1].style.display = 'none';
                }, 1500)
                //remove local storage
                window.localStorage.removeItem(checkBoxID);
            }
        }

    </script>
@stop