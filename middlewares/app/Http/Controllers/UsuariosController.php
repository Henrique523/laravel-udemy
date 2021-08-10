<?php

namespace App\Http\Controllers;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('primeiro');
    }

    public function index()
    {
        return '<h3>Lista de Usuários</h3>' .
                '<ul>' .
                    '<li>admin</li>' .
                    '<li>desenvolvedores</li>' .
                    '<li>lojistas</li>' .
                '</ul>';
    }
}
