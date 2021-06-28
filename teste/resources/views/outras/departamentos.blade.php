@extends('layouts.principal')
@section('titulo', 'Departamentos')
@section('conteudo')

<h3>Departamentos</h3>

<ul>
    <li>Computadores</li>
    <li>Eletronicos</li>
    <li>Acessorios</li>
    <li>Roupas</li>
</ul>

@component('components.alerta', ['titulo' => 'Erro fatal', 'tipo' => 'warning'])
    <p><strong>Erro inesperado</strong></p>
    <p>Ocorreu um erro inesperado</p>
@endcomponent

@endsection
