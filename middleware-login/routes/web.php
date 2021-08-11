<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoController@index');

Route::get('/negado', function () {
    return 'Acesso negado.';
})->name('negado');

Route::post('/login', function (Request $request) {
    $loginOk = false;
    $admin = false;
    switch ($request->input('user')) {
        case 'Joao':
            $loginOk = $request->input('passwd') === 'senhajoao';
            $admin = true;
            break;
        case 'Marcos':
            $loginOk = $request->input('passwd') === 'senhamarcos';
            break;
        default:
            $loginOk = false;
            break;
    }

    if ($loginOk) {
        $login = [
            'user' => $request->input('user'),
            'password' => $request->input('passwd'),
            'admin' => $admin,
        ];
        $request->session()->put('login', $login);
        return response('Login OK');
    } else {
        $request->session()->flush();

        return response('Erro no login', 404);
    }
});

Route::get('/logout', function (Request $request) {
    $request->session()->flush();
    return response('Deslogado com sucesso');
});
