<?php

Route::get('/','FilmsController@index');

Route::get('/film/{id}', 'FilmsController@show');
