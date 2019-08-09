<?php

namespace App\Http\Apis;

class GetRemoteData {
  
  public static function get()
  {
    $client = new \GuzzleHttp\Client(['base_uri' => 'https://swapi.co/api/']);
    $res = $client->request('GET', 'films');
    $statusCode= $res->getStatusCode();
    $header= $res->getHeader('content-type');
    $data = $res->getBody()->getContents();
    $decodedData = json_decode($data, true);
    return $decodedData['results'];
  }
}

