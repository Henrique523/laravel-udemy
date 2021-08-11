<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produtos = ['Televisao', 'Notebook', 'Mouse', 'Teclado'];

    public function __construct()
    {
        $this->middleware('produto-admin');
    }
    public function index()
    {
        echo "<h3>Produtos</h3>";
        echo "<ul>";

        foreach ($this->produtos as $produto) {
            echo "<li>{$produto}</li>";
        }

        echo "</ul>";
    }
}
