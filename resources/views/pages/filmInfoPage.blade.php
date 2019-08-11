@extends('layouts.app')

@section('header')
    <div class="container">
        <h1 class="center">FILM TITLE</h1>
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
    <p>characters Array  with tooltip</p>
    <p>species Array</p>
    <p>starships Array</p>
    <p>vehicle Array</p>
    <p>Planets Array</p>   
@endsection