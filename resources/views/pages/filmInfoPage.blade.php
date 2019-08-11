@extends('layouts.app')

@section('header')
        <h1>{{$filmData['title']}}</h1>
        <p>Episode: {{$filmData['episode_id']}} </p>
        <p>Director: {{$filmData['director']}}</p>
        <p>Producer:  {{$filmData['producer']}}</p>
        <p>Release date: {{$filmData['release_date']}}</p>
@stop

@section('navbar')
  <a href="/">Homepage</a>
@stop


@section('content')
    <p>Opening Crawl: {{$filmData['opening_crawl']}}</p>
    <p>characters Array  with tooltip</p>
    <p>species Array</p>
    <p>starships Array</p>
    <p>vehicle Array</p>
    <p>Planets Array</p>   
@endsection   {{-- @endsection means @stop  --}} 
