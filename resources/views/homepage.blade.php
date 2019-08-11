@extends('layouts.app')

@section('header')
    <div class="container">
        <h1 class="center">Star Wars Info</h1>
        <p>All the information about Star Wars movies that you should know!</p>
    </div>
@stop

@section('content')
    {{-- <form method="GET" action="/" onkeydown="this.submit();"> --}}
    <label>Search:
            <input type='search' name="search" placeholder="by words in film title" /> 
        </label>
        {{-- <button type="submit">Search</button> --}}
    {{-- </form> --}}
    <ul>
        @foreach($orderedFilmsDataArr as $filmData)
                <li>
                    <h3>{{$filmData['title']}}</h3>
                    <p>Episode: {{$filmData['episode_id']}}</p>
                    <p>Director: {{$filmData['director']}}
                    <p>Release Date: {{$filmData['release_date']}}</p>
                    <a href="#">details</a>
                </li>
        @endforeach  
    </ul>
@stop