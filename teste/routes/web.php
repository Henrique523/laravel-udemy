<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
 * Para passar o controller na rota, basta passá-lo como uma string.
 * Para separar o nome do controller do método dele que será chamado, basta usar @
 */
Route::get('/produtos', 'MeuControlador@produtos');
Route::get('/nome', 'MeuControlador@getNome');
Route::get('/idade', 'MeuControlador@getIdade');
Route::get('/multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar')
    ->where('n1', '[0-9]+')
    ->where('n2', '[0-9]+');

//// Parâmetro para a rota
//// O nome da variável passada para a funcao anonima nao precisa ser o nome dito na rota,
//// apesar de ser recomendado
//Route::get('/ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
//    echo "Ola! Seja bem vindo, " . $nome . " " . $sobrenome . "!";
//});
//
//// Ao passar interrogacao para o parametro, este passa a ser opcional.
//Route::get('/seunome/{nome?}', function ($nome = null) {
//    if (isset($nome))
//        return "Ola! Seja bem vindo, " . $nome . "!";
//    echo "Nao foi passado nenhum parametro.";
//});
//
//// O metodo "where" eh usado para validar os parametros da rota passados.
//// Caso haja alguma incompatibilidade entre o que foi passado e o parametro de validacao,
//// o laravel retornara que a rota nao foi encontrada.
//Route::get('/rotacomregras/{nome}/{n}', function ($nome, $n) {
//    for ($i = 0; $i < $n; $i++) {
//      echo "Ola! Seja bem vindo, $nome! <br>";
//    }
//})->where('nome', '[A-Za-z]+')->where('n', '[0-9]+');
//
///*
// * A funcao estatica "prefix" cria um caminho para as rotas que serao agrupadas.
// * O metodo "group" reune todas as rotas que serao precedidas da rota implementada no prefix.
// * Desta forma, criando rotas filas, com seus respectivos metodos.
// */
//
///*
// * O método "name" faz o que chamamos de nomear uma rota. Desta forma, nos arquivos blade, por exemplo,
// * podemos chamar uma funcao Helper para acessarmos a rota que desejamos (route('nomeDaRota')).
// * Bastante útil quando estamos lidando com aplicações cuja rota pode ser alterada.
// */
//Route::prefix('/aplicacao')->group(function() {
//    Route::get('/', function () {
//        return view('app');
//    })->name('app');
//
//    Route::get('/user', function () {
//        return view('user');
//    })->name('app.user');
//
//    Route::get('/profile', function () {
//        return view('profile');
//    })->name('app.profile');
//});
//
//Route::get('/produtos', function() {
//    echo "<h1>Produtos</h1>";
//    echo "<ol>";
//    echo "<li>Notebook</li>";
//    echo "<li>Impressora</li>";
//    echo "<li>Mouse</li>";
//    echo "</ol>";
//})->name('meusprodutos');
//
///*
// * Há duas formas de redirecionar rotas no Laravel.
// * A primeira forma é usando o método estático redirect (Route::redirect), que fará o redirecionamento direto da rota.
// * A segunda forma é redirecionando dentro de um método, como o Route::get abaixo. Dessa forma, podemos tratar
// * os dados, ou realizar outras tarefas antes da rota ser redirecionada.
// */
//Route::redirect('todosprodutos1', 'produtos', 301);
//Route::get('todosprodutos2', function() {
//    return redirect()->route('meusprodutos');
//});
//
//Route::post('/requisicoes', function(Request $request) {
//    return 'Helo POST';
//});
//
//Route::delete('/requisicoes', function(Request $request) {
//    return 'Helo DELETE';
//});
//
//Route::put('/requisicoes', function(Request $request) {
//    return 'Helo PUT';
//});
//
//Route::patch('/requisicoes', function(Request $request) {
//    return 'Helo PATCH';
//});
//
//Route::options('/requisicoes', function(Request $request) {
//    return 'Helo OPTIONS';
//});
