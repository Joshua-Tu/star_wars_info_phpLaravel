@extends('layouts.app')


@section('header')
        <h1 class="center">Star Wars Info</h1>
        <p>All the information about Star Wars movies that you should know!</p>
@stop


@section('searchBar')
{{-- <form method="GET" action="/" onkeydown="this.submit();"> --}}
    <label>Search:
        <input type='search' name="search" placeholder="by words in film title" /> 
    </label>
    {{-- <button type="submit">Search</button> --}}
{{-- </form> --}}        
@stop


@section('content')
    <ul>
        @foreach($orderedFilmsArr as $filmData)
                <li>
                    <h3>{{$filmData['title']}}</h3>
                    <p>Director: {{$filmData['director']}}
                    <p>Episode: {{$filmData['episode_id']}}</p>
                    <p>Release Date: {{$filmData['release_date']}}</p>
                    <a href="/film/{{$filmData['episode_id']}}">details</a>
                </li>
        @endforeach  
    </ul>
@stop