@extends('layouts.principal')

@section('titulo', 'Opcoes')

@section('conteudo')

<div class="options">
    <ul>
        <li><a class="warning {{ request()->route()->parameter('opcao') === '1' ? 'selected' : '' }}"  href="{{ route('opcoes', 1) }}">warning</a></li>
        <li><a class="info {{ request()->route()->parameter('opcao') === '2' ? 'selected' : '' }}"     href="{{ route('opcoes', 2) }}">info</a></li>
        <li><a class="success {{ request()->route()->parameter('opcao') === '3' ? 'selected' : '' }}"  href="{{ route('opcoes', 3) }}">success</a></li>
        <li><a class="error {{ request()->route()->parameter('opcao') === '4' ? 'selected' : '' }}"    href="{{ route('opcoes', 4) }}">error</a></li>
    </ul>
</div>

@if(isset($opcao))

    @switch($opcao)
        @case(1)
            @alerta(['titulo' => 'Warning', 'tipo' => 'warning'])
                <p><strong>Erro inesperado</strong></p>
                <p>Ocorreu um erro inesperado</p>
            @endalerta
            @break
        @case(2)
            @alerta(['titulo' => 'Info', 'tipo' => 'info'])
                <p><strong>Info</strong></p>
                <p>Informação</p>
            @endalerta
            @break
        @case(3)
            @alerta(['titulo' => 'Sucesso', 'tipo' => 'success'])
                <p><strong>Sucesso</strong></p>
                <p>Sucesso</p>
            @endalerta
            @break
        @case(4)
            @alerta(['titulo' => 'Erro', 'tipo' => 'error'])
                <p><strong>Erro</strong></p>
                <p>Erro</p>
            @endalerta
            @break
    @endswitch
@endif

@endsection
