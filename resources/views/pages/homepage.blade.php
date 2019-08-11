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
                <input class="prompt" type="text" placeholder="Search movies">
                <i class="search icon"></i>
        </div>
        <div class="results"></div>
    </div>
@stop


@section('content')
    <ul>
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