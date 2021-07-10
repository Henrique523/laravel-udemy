<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function index()
    {
        $produtos = Produto::with('categoria')->get();

        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        Produto::create([
            'nome' => $request->nomeProduto,
            'preco' => $request->precoProduto,
            'estoque' => (int) $request->estoqueProduto,
            'categoria_id' => $request->categoriaProduto,
        ]);

        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $produto = Produto::find($id);

        if(isset($produto)) {
            $produto->update([
                'nome' => $request->nomeProduto,
                'preco' => $request->precoProduto,
                'estoque' => (int) $request->estoqueProduto,
                'categoria_id' => $request->categoriaProduto,
            ]);

            return redirect()->route('produtos.index');
        }
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (isset($produto)) {
            $produto->delete();
        }

        return redirect()->route('produtos.index');
    }
}
