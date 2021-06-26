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

use Illuminate\Support\Facades\Route;

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

// O metodo "where" eh usado para validar os parametros da rota passados.
// Caso haja alguma incompatibilidade entre o que foi passado e o parametro de validacao,
// o laravel retornara que a rota nao foi encontrada.
Route::get('/rotacomregras/{nome}/{n}', function ($nome, $n) {
    for ($i = 0; $i < $n; $i++) {
      echo "Ola! Seja bem vindo, $nome! <br>";
    }
})->where('nome', '[A-Za-z]+')->where('n', '[0-9]+');

/*
 * A funcao estatica "prefix" cria um caminho para as rotas que serao agrupadas.
 * O metodo "group" reune todas as rotas que serao precedidas da rota implementada no prefix.
 * Desta forma, criando rotas filas, com seus respectivos metodos.
 */

/*
 * O método "name" faz o que chamamos de nomear uma rota. Desta forma, nos arquivos blade, por exemplo,
 * podemos chamar uma funcao Helper para acessarmos a rota que desejamos (route('nomeDaRota')).
 * Bastante útil quando estamos lidando com aplicações cuja rota pode ser alterada.
 */
Route::prefix('/aplicacao')->group(function() {
    Route::get('/', function () {
        return view('app');
    })->name('app');

    Route::get('/user', function () {
        return view('user');
    })->name('app.user');

    Route::get('/profile', function () {
        return view('profile');
    })->name('app.profile');
});

Route::get('/produtos', function() {
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
})->name('meusprodutos');
