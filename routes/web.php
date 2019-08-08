<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');

    // require './vender/autoload.php';
    // $client = new \GuzzleHttp\Client();
    // $response = $client->request('GET', 'https://swapi.co/api/films');
    // echo $response->getStatusCode();
    
    $fetchedData = file_get_contents('https://swapi.co/api/films');
    $decodeData = json_decode($fetchedData, true);
    $films = array_column($decodeData['results'],'title');
    return view('welcome',compact('films'));
});
