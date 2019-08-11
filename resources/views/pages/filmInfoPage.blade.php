@extends('layouts.app')

@section('header')
    <div class="container">
        <h1 class="center">FILM <TITLE></TITLE></h1>
        <p>Episode ID</p>
        <p>Director</p>
        <p>Producer</p>
        <p>Release date</p>
        <a href="/">Homepage Film List</a>
    </div>
@stop

@section('content')
    <h1>This is {{$id}}</h1>
    <p>opening_crawl</p>
    <p>characters</p>
    <p>species</p>
    <p>starships</p>
    <p>vehicle</p>
    <p>planets</p>

    
@endsection