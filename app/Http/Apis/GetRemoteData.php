<?php

namespace App\Http\Apis;

class GetRemoteData {
  
  public static function get($dataName)
  {
    $client = new \GuzzleHttp\Client(['base_uri' => 'https://swapi.co/api/']);
    //$res = $client->request('GET', "films/?search=" . $_GET["search"]);
    $res = $client->request('GET', $dataName);
    $statusCode= $res->getStatusCode();
    $header= $res->getHeader('content-type');
    $data = $res->getBody()->getContents();
    $decodedData = json_decode($data, true);
    return $decodedData['results'];
  }
}

