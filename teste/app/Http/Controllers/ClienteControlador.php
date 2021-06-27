<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClienteControlador extends Controller
{
    private $clientes = [
        ['id' => 1, 'nome' => 'Ademir'],
        ['id' => 2, 'nome' => 'João'],
        ['id' => 3, 'nome' => 'Maria'],
    ];

    public function index()
    {
       $clientes = $this->clientes;
       return view('clientes.index', compact(['clientes']));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $dados = [
            'id' => count($this->clientes) + 1,
            'nome' => $request->nome,
        ];
        $this->clientes[] = $dados;

        return redirect()->route('clientes.index');
    }

    public function show(int $id): Response
    {
        //
    }

    public function edit(int $id): Response
    {
        //
    }

    public function update(Request $request, int $id): Response
    {
        //
    }

    public function destroy(int $id): Response
    {
        //
    }
}
