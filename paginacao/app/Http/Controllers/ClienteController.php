<?php

namespace App\Http\Controllers;

use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('index', compact('clientes'));
    }

    public function indexjs()
    {
        return view('indexjs');
    }

    public function indexjson()
    {
        return Cliente::paginate(10);
    }
}
