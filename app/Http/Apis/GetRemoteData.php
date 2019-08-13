<?php

namespace App\Http\Apis;

class GetRemoteData {
  
  public static function getFilms()
  {
    $client = new \GuzzleHttp\Client(['base_uri' => 'https://swapi.co/api/']);
    //$res = $client->request('GET', "films/?search=" . $_GET["search"]);
    $res = $client->request('GET', "films");
    $statusCode= $res->getStatusCode();
    $header= $res->getHeader('content-type');
    $data = $res->getBody()->getContents();
    $decodedData = json_decode($data, true);
    return $decodedData['results'];
  }

  public static function getInfo($url)
  {
    $client = new \GuzzleHttp\Client(['base_uri' => $url]);
    $res = $client->request('GET');
    $statusCode= $res->getStatusCode();
    $header= $res->getHeader('content-type');
    $data = $res->getBody()->getContents();
    $decodedData = json_decode($data, true);
    return $decodedData;
  }  

}

