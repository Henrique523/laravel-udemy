<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        Categoria::create([
            'nome' => $request->input('nomeCategoria'),
        ]);

        return redirect()->route('categorias.index');
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
        $categoria = Categoria::find($id);
        if (isset($categoria)) {
            return view('categorias.create', compact('categoria'));
        }

        return redirect()->route('categorias.index');
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if (isset($categoria)) {
            $categoria->update([
                'nome' => $request->input('nomeCategoria'),
            ]);
            return redirect()->route('categorias.index');
        }
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if (isset($categoria)) {
            $categoria->delete();
        }

        return redirect()->route('categorias.index');
    }
}
