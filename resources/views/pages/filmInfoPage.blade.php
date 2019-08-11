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

    <div>Characters:<br/>
      <ul>
          @foreach($charactersArr as $character)
                  <li>
                      <h3>{{$character['name']}}</h3>
                  </li>
          @endforeach  
      </ul>
    </div>

    <div>Planets:<br/>
      <ul>
          @foreach($planets as $planet)
            <li>
              <h3>{{$planet['name']}}</h3>
            </li>
          @endforeach  
      </ul>
    </div>

    <div>Species:<br/>
      <ul>
          @foreach($species as $specy)
            <li>
              <h3>{{$specy['name']}}</h3>
            </li>
          @endforeach  
      </ul>
    </div>

    <div>Starships:<br/>
      <ul>
          @foreach($starships as $starship)
            <li>
              <h3>{{$starship['name']}}</h3>
            </li>
          @endforeach  
      </ul>
    </div>

    <div>Vehicles:<br/>
      <ul>
          @foreach($vehicles as $vehicle)
            <li>
              <h3>{{$vehicle['name']}}</h3>
            </li>
          @endforeach  
      </ul>
    </div>   

@endsection   {{-- @endsection means @stop  --}} 
