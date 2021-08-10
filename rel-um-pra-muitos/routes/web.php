<?php

use App\Categoria;
use App\Produto;
use Illuminate\Support\Facades\Route;

Route::get('/categorias', function () {
    $categorias = Categoria::all();

    if (count($categorias) === 0) {
        echo "<h4>Não foi encontrada nenhuma Categoria</h4>";
    } else {
        foreach ($categorias as $categoria) {
            echo "<p>{$categoria->id}. {$categoria->nome}</p>";
        }
    }
});

Route::get('/categorias-produtos', function () {
    $categorias = Categoria::with('produtos')->get();

    if (count($categorias) === 0) {
        echo "<h4>Não foi encontrada nenhuma Categoria</h4>";
    } else {
        foreach ($categorias as $categoria) {
            echo "<p>{$categoria->id}. {$categoria->nome} - {$categoria->produtos}</p>";
        }
    }
});

Route::get('categorias-produtos/json', function () {
    $cats = Categoria::with('produtos')->get();
    return $cats->toJson();
});

Route::get('/produtos', function () {
    $produtos = Produto::all();

    if (count($produtos) === 0) {
        echo "<h4>Não foi encontrada nenhum Produto</h4>";
    } else {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>Nome</td>";
        echo "<td>Estoque</td>";
        echo "<td>Preço</td>";
        echo "<td>Categoria</td>";
        echo "</tr>";
        echo "</thead>";

        foreach ($produtos as $produto) {
            echo "<tr>";
            echo "<td>{$produto->nome}</td>";
            echo "<td>{$produto->estoque}</td>";
            echo "<td>{$produto->preco}</td>";
            echo "<td>{$produto->categoria->nome}</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
});


Route::get('/adicionar-produto', function () {
    $categoria = Categoria::find(1);

    $produto = new Produto();
    $produto->nome = 'Meu novo produto';
    $produto->estoque = 50;
    $produto->preco = 150;
    $produto->categoria()->associate($categoria);

    $produto->save();

    return $produto->toJson();
});

Route::get('/disassocia-categoria', function () {
    $produto = Produto::find(10);
    if (isset($produto)) {
        $produto->categoria()->dissociate();
        $produto->save();

        return $produto->toJson();
    }
});

Route::get('/adicionar-produto/{categoriaId}', function ($categoriaId) {
    $categoria = Categoria::with('produtos')->find($categoriaId);

    $produto = new Produto();
    $produto->nome = 'Meu novo produto teste';
    $produto->estoque = 50;
    $produto->preco = 150;

    if (isset($cat)) {
        $categoria->produtos()->save($produto);
    }

    // Carrega as mudanças feitas acima, de forma a carregar os produtos atualizados.
    $categoria->load('produtos');

    return $categoria->toJson();
});
