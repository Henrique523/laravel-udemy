<?php

use App\{Cliente, Endereco};
use Illuminate\Support\Facades\Route;

Route::get('/clientes', function () {
    $clientes = Cliente::all();

    foreach($clientes as $cliente) {
        echo "<p>ID: {$cliente->id}</p>";
        echo "<p>Nome: {$cliente->nome}</p>";
        echo "<p>Telefone: {$cliente->telefone}</p>";
        echo "<hr>";
    }
});

Route::get('/enderecos', function () {
    $enderecos = Endereco::all();

    foreach($enderecos as $endereco) {
        echo "<p>Cliente ID: {$endereco->cliente_id}</p>";
        echo "<p>Numero: {$endereco->rua}</p>";
        echo "<p>Bairro: {$endereco->bairro}</p>";
        echo "<p>Cidade: {$endereco->cidade}</p>";
        echo "<p>UF: {$endereco->UF}</p>";
        echo "<p>CEP: {$endereco->CEP}</p>";
        echo "<hr>";
    }
});
