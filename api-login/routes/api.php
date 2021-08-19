<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('registro', 'AuthController@registro');
    Route::post('login', 'AuthController@login');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'AuthController@logout');
    });
});

Route::get('produtos', 'ProdutosController@index')
    ->middleware('auth:api');
