<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Apis\GetRemoteData;


class FilmsController extends Controller
{
    protected $orderedFilmsDataArr;

    public function __construct() {
        //The array_sort LARAVEL HELPER FUNCTION sorts the array by the results of the given Closure:
        $this->orderedFilmsDataArr = array_values(array_sort(GetRemoteData::get('films'), 
            function ($value) {
                return $value['episode_id'];  //ordered with episode_id number
            }));
    }


    public function index()
    {           
        $orderedFilmsArr =  $this->orderedFilmsDataArr;
        
        // dd($_GET['search']);
        // $filmTitleArr = array_column($this->filmsDataArr,'title');
        // $fileDirectorArr = array_column($this->filmsDataArr,'director');
        // $filmEpiIdArr = array_column($this->filmsDataArr,'episode_id');
        // $filmeReleDateArr = array_column($this->filmsDataArr,'release_date');
        //dd($fileDirectorArr);
        return view('pages.homepage',compact('orderedFilmsArr'));

    }


    public function show($id)
    {   
        $orderedFilmsArr =  $this->orderedFilmsDataArr;        
        $filmEpiIdArr = array_column($orderedFilmsArr,'episode_id');
        if(in_array($id, $filmEpiIdArr)){
            $filmInfo = $filmsDataArr[$id - 1]; //episode_id starts with 1
            dd($filmInfo);
            return view('pages.filmInfoPage',compact('id'));
        }
        echo '<h1>Page not found</h1>';
    }
    
}
