<?php

Route::get('/cliente', 'ClienteController@create')->name('novo-cliente');
Route::get('/', 'ClienteController@index')->name('clientes');
Route::post('/cliente', 'ClienteController@store')->name('criar-cliente');
