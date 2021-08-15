<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@index');
Route::post('/', 'PostController@store');
Route::delete('/{post}', 'PostController@destroy');
Route::get('/download/{post}', 'PostController@download');
