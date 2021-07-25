<?php

use App\{Cliente, Endereco};
use Illuminate\Support\Facades\Route;

Route::get('/clientes', function () {
    $clientes = Cliente::all();

    foreach($clientes as $cliente) {
        echo "<p>ID: {$cliente->id}</p>";
        echo "<p>Nome: {$cliente->nome}</p>";
        echo "<p>Telefone: {$cliente->telefone}</p>";
        echo "<p>Cliente ID: {$cliente->endereco->cliente_id}</p>";
        echo "<p>Numero: {$cliente->endereco->rua}</p>";
        echo "<p>Bairro: {$cliente->endereco->bairro}</p>";
        echo "<p>Cidade: {$cliente->endereco->cidade}</p>";
        echo "<p>UF: {$cliente->endereco->UF}</p>";
        echo "<p>CEP: {$cliente->endereco->CEP}</p>";

        echo "<hr>";
    }
});

Route::get('/enderecos', function () {
    $enderecos = Endereco::all();

    foreach($enderecos as $endereco) {
        echo "<p>Endereço ID: {$endereco->cliente_id}</p>";
        echo "<p>Nome: {$endereco->cliente->nome}</p>";
        echo "<p>Telefone: {$endereco->cliente->telefone}</p>";
        echo "<p>Numero: {$endereco->rua}</p>";
        echo "<p>Bairro: {$endereco->bairro}</p>";
        echo "<p>Cidade: {$endereco->cidade}</p>";
        echo "<p>UF: {$endereco->UF}</p>";
        echo "<p>CEP: {$endereco->CEP}</p>";
        echo "<hr>";
    }
});

Route::get('/inserir', function() {
    $cliente = Cliente::create([
       'nome' => 'Guilherme Henrique',
        'telefone' => '62992176965',
    ]);

    $endereco = new Endereco();
    $endereco->rua = '3';
    $endereco->numero = '65';
    $endereco->bairro = 'Sao Paulo';
    $endereco->cidade = 'Sao Paulo';
    $endereco->UF = 'SP';
    $endereco->CEP = '13040-456';

    $cliente->endereco()->save($endereco);

    $cliente = Cliente::create([
        'nome' => 'Guilherme Henrique Lemes',
        'telefone' => '62992176955',
    ]);

    $endereco = new Endereco();
    $endereco->rua = 'ipiranga';
    $endereco->numero = '1500';
    $endereco->bairro = 'Jardim Olivia';
    $endereco->cidade = 'Sao Paulo';
    $endereco->UF = 'SP';
    $endereco->CEP = '13040-789';

    $cliente->endereco()->save($endereco);
});

Route::get('/clientes/json', function () {
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();
});

Route::get('/enderecos/json', function () {
//    $enderecos = Endereco::all();
    $enderecos = Endereco::with(['cliente'])->get();
    return $enderecos->toJson();
});
