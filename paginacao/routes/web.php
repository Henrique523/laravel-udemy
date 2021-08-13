<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', 'ClienteController@index');

Route::get('/', 'ClienteController@indexjs');
Route::get('/json', 'ClienteController@indexjson');
