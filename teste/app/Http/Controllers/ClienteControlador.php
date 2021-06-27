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
/*
 * A função __construct está sendo usada para buscar os clientes na sessão. Caso esta sessão ainda não exista,
 * o método criará a sessão com a chave clientes.
 */
    public function __construct()
    {
        $clientes = session('clientes');
        if (!isset($clientes)) {
            session(['clientes' => $this->clientes]);
        }
    }

    /*
     * Ao invés de buscar os clientes do atributo, o index busca da sessão para simular um banco de dados.
     */
    public function index()
    {
       $clientes = session('clientes');
       return view('clientes.index', compact(['clientes']));
    }

    public function create()
    {
        return view('clientes.create');
    }

    /*
     * Ao invés de armazenar o novo cliente no atributo, o método store armazena na sessão,
     * para simular o funcionamento de um banco de dados.
     */
    public function store(Request $request)
    {
        $clientes = session('clientes');
        $dados = [
            'id' => count($clientes) + 1,
            'nome' => $request->nome,
        ];
        $clientes[] = $dados;
        session(['clientes'=> $clientes]);

        return redirect()->route('clientes.index');
    }

    public function show(int $id)
    {
        $clientes = session('clientes');
        $cliente = $clientes[$id - 1];
        return view('clientes.info', compact(['cliente']));
    }

    public function edit(int $id)
    {
        $clientes = session('clientes');
        $cliente = $clientes[$id - 1];
        return view('clientes.edit', compact(['cliente']));
    }

    public function update(Request $request, int $id)
    {
        $clientes = session('clientes');
        $clientes[$id - 1]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    public function destroy(int $id)
    {
        //
    }
}
