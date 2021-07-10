<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::resource('produtos', 'ProdutosController');
Route::resource('categorias', 'CategoriasController');
Route::get('categorias/{id}/delete', 'CategoriasController@destroy');
