<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        echo "<h4>Departamentos</h4>";
        echo "<ul>";
        echo    "<li>Departamento 1</li>";
        echo    "<li>Departamento 2</li>";
        echo    "<li>Departamento 3</li>";
        echo "</ul>";

        if (auth()->check()) {
            $user = auth()->user();
            echo "<p>Nome Completo" . $user->name . "</p>";
            echo "Email" . $user->email;
        } else {
            echo "<h4>Você não está logado </h4>";
        }
    }
}
