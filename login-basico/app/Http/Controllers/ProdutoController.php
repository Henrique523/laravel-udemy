<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        echo "<h4>Produtos</h4>";
        echo "<ul>";
        echo    "<li>Item 1</li>";
        echo    "<li>Item 2</li>";
        echo    "<li>Item 3</li>";
        echo "</ul>";
    }
}
