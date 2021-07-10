@extends('layout.app', ["current" => "produtos"])

@section('body')
    <h3 class="card-title mb-4">Cadastro de Produtos</h3>
    <div class="card border">
        <div class="card-header">
                <a href="{{ route('produtos.create') }}" class="btn btn-info ml-auto mr-3" role="button">Novo Produto</a>
        </div>
        <div class="card-body">
            @if(count($produtos) > 0)
                <table class="table table-ordered table-striped table-hover">
                    <thead>
                    <tr class="justify-content-center">
                        <th class="text-center">Código</th>
                        <th class="text-center">Descrição</th>
                        <th class="text-center">Estoque</th>
                        <th class="text-center">Preço</th>
                        <th class="text-center">Categoria</th>
                        <th class="text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td class="text-center">{{ $produto->id }}</td>
                            <td class="text-center">{{ $produto->nome }}</td>
                            <td class="text-center">{{ $produto->estoque }}</td>
                            <td class="text-center">{{ $produto->preco }}</td>
                            <td class="text-center">{{ $produto->categoria->nome }}</td>
                            <td>
                                <a href="/produtos/{{ $produto->id }}/edit" class="btn btn-sm btn-primary btn-lg fa fa-edit"></a>
                                <a href="/produtos/{{ $produto->id }}/delete" class="btn btn-sm btn-danger btn-lg fa fa-trash"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="mt-4">Não há produtos cadastrados</h3>
            @endif
        </div>
    </div>
@endsection
