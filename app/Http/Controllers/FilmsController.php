<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Apis\GetRemoteData;


class FilmsController extends Controller
{
    protected $orderedFilmsDataArr;

    public function __construct() {
        //The array_sort LARAVEL HELPER FUNCTION sorts the array by the results of the given Closure:
        $this->orderedFilmsDataArr = array_values(array_sort(GetRemoteData::getFilms(), 
            function ($value) {
                return $value['episode_id'];  //ordered with episode_id number
            }));
    }


    public function index()
    {           
        $orderedFilmsArr =  $this->orderedFilmsDataArr;
        
        return view('pages.homepage',compact('orderedFilmsArr'));

    }


    public function show($id)
    {   
        $orderedFilmsArr =  $this->orderedFilmsDataArr;
        $filmEpiIdArr = array_column($orderedFilmsArr,'episode_id');
        if(in_array($id, $filmEpiIdArr)){
            $filmData = $orderedFilmsArr[$id - 1];
    
            $charactersArr = array_map(function ($characterUrl) {
                return (array) GetRemoteData::getInfo($characterUrl);
              }, $filmData['characters']);

            
            $planets = array_map(function ($planetUrl) {
                return (array) GetRemoteData::getInfo($planetUrl);
              }, $filmData['planets']);
           
            $species = array_map(function ($specyUrl) {
                return (array) GetRemoteData::getInfo($specyUrl);
              }, $filmData['species']);

            $starships = array_map(function ($starshipUrl) {
                    return (array) GetRemoteData::getInfo($starshipUrl);
                  }, $filmData['starships']);

            $vehicles = array_map(function ($vehicleUrl) {
                return (array) GetRemoteData::getInfo($vehicleUrl);
              }, $filmData['vehicles']);
            
            return view('pages.filmInfoPage',compact(
                'filmData',
                'charactersArr',
                'planets',
                'species',
                'starships',
                'vehicles'
            ));
        }
        echo '<h1>Page not found</h1>';
    }
}
