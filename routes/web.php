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

Route::get('/','FilmsController@index');

Route::get('/film/{id}', 'FilmsController@show');

// Route::get('/', function () {
//     //return view('welcome');

//     // $fetchedData = file_get_contents('https://swapi.co/api/films');
//     // $decodeData = json_decode($fetchedData, true);
//     // $films = array_column($decodeData['results'],'title');
//     // return view('welcome',compact('films'));

//     $filmsDataArr = GetRemoteData::get();
//     $filmTitleArr = array_column($filmsDataArr,'title');
//     dd($filmTitleArr);
// });