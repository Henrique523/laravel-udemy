<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProdutosController extends Controller
{
    public function index()
    {
        $expiresAt = 600; //minutos

        $produtos = Cache::remember('todososprodutos', $expiresAt, function () {
            info('Passei por aqui');
            return Produto::with(['categorias'])->get();
        });
        return view('produtos', compact('produtos'));
    }
}
