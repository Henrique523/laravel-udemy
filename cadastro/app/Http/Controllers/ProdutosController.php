<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function indexView()
    {
        return view('produtos.index');
    }

    public function index()
    {
        $produtos = Produto::with('categoria')->get();

        return $produtos->toJson();
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $novoProduto = Produto::create([
            'nome' => $request->nomeProduto,
            'preco' => $request->precoProduto,
            'estoque' => (int) $request->estoqueProduto,
            'categoria_id' => $request->categoriaProduto,
        ]);

        return Produto::with('categoria')->find($novoProduto->id)->first();
    }

    public function show($id)
    {
        $produto = Produto::find($id);

        if (isset($produto)) {
            return $produto->toJson();
        }

        return response('Produto não encontrado', 404);
    }

    public function edit($id)
    {
        $produto = Produto::with('categoria')
            ->find($id);

        $categorias = Categoria::all();

        if (isset($produto) && isset($produto)) {
            return view('produtos.create', compact('categorias', 'produto'));
        }

        return redirect()->route('produtos.index');
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::with('categoria')->find($id);

        if(isset($produto)) {
            $produto->update([
                'nome' => $request->input('nomeProduto'),
                'preco' => $request->input('precoProduto'),
                'estoque' => (int) $request->input('estoqueProduto'),
                'categoria_id' => $request->input('categoriaProduto'),
            ]);

            return $produto->toJson();
        }

        return response('Produto não encontrado', 404);
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (isset($produto)) {
            $produto->delete();
            return response('Produto deletado com sucesso');
        }

        return response('Produto não encontrado', 404);
    }
}
