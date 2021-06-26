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

Route::get('/', function () {
    return view('welcome');
});

// Parâmetro para a rota
// O nome da variável passada para a funcao anonima nao precisa ser o nome dito na rota,
// apesar de ser recomendado
Route::get('/ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    echo "Ola! Seja bem vindo, " . $nome . " " . $sobrenome . "!";
});

// Ao passar interrogacao para o parametro, este passa a ser opcional.
Route::get('/seunome/{nome?}', function ($nome = null) {
    if (isset($nome))
        return "Ola! Seja bem vindo, " . $nome . "!";
    echo "Nao foi passado nenhum parametro.";
});
