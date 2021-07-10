@extends('layout.app', ["current" => "categorias"])

@section('body')
    <h3 class="card-title mb-4">Cadastro de Categorias</h3>
    <div class="card border">
        <div class="card-header">
            <div class="row my-4">
                <a href="{{ route('categorias.create') }}" class="btn btn-info ml-auto mr-3" role="button">Nova Categoria</a>
            </div>
        </div>
        <div class="card-body">
            @if(count($categorias) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome da Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nome }}</td>
                                <td>
                                    <a href="/categorias/{{ $categoria->id }}/edit" class="btn btn-sm btn-primary btn-lg fa fa-edit"></a>
                                    <a href="/categorias/{{ $categoria->id }}/delete" class="btn btn-sm btn-danger btn-lg fa fa-trash"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="mt-4">Não há categorias cadastradas</h3>
            @endif
        </div>
    </div>
@endsection
