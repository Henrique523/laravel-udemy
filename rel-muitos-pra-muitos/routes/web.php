<?php

use App\Desenvolvedor;
use App\Projeto;
use Illuminate\Support\Facades\Route;

Route::get('/desenvolvedor', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    return $desenvolvedores;
});


Route::get('/projeto', function () {
    $projetos = Projeto::with('desenvolvedores')->get();

    return $projetos;
});

Route::get('/alocar', function () {
    $projeto = Projeto::find(2);

    if (isset($projeto)) {
        $projeto->desenvolvedores()->attach([
            2 => ['horas_semanais' => 50],
        ]);
    }

    $projeto->load('desenvolvedores');

    return $projeto;
});

Route::get('/desalocar', function () {
    $projeto = Projeto::find(2);

    if (isset($projeto)) {
        $projeto->desenvolvedores()->detach([1,2,3]);
    }

    $projeto->load('desenvolvedores');

    return $projeto;
});
