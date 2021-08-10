<?php

use Illuminate\Support\Facades\Route;

Route::get('/usuarios', 'UsuariosController@index');
    // ->middleware('primeiro');
