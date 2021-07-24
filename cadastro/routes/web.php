<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('produtos', 'ProdutosController@indexView');
Route::get('produtos/{id}/delete', 'ProdutosController@destroy');

Route::resource('categorias', 'CategoriasController');
Route::get('categorias/{id}/delete', 'CategoriasController@destroy');
