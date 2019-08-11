<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Apis\GetRemoteData;


class FilmsController extends Controller
{
    public function __construct() {

        $this->filmsData = GetRemoteData::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $filmsDataArr = $this->filmsData;
        
        //The array_sort laravel helper function sorts the array by the results of the given Closure:
        $orderedFilmsDataArr = array_values(array_sort($filmsDataArr, function ($value) {
            return $value['episode_id'];
        }));
        
        // dd($_GET['search']);
        // $filmTitleArr = array_column($this->filmsDataArr,'title');
        // $fileDirectorArr = array_column($this->filmsDataArr,'director');
        // $filmEpiIdArr = array_column($this->filmsDataArr,'episode_id');
        // $filmeReleDateArr = array_column($this->filmsDataArr,'release_date');
        //dd($fileDirectorArr);
        return view('homepage',compact('orderedFilmsDataArr'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
