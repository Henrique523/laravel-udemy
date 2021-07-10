@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form
                @if(isset($produto))
                action="/produtos/{{ $produto->id }}"
                @else
                action="/produtos"
                @endif
                method="POST"
            >
                @csrf
                @if(isset($produto))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="font-weight-bold h5" style="color: var(--gray-dark)">Nome</div>
                        </div>
                        <div class="col-10">
                            <input
                                type="text"
                                class="form-control"
                                name="nomeProduto"
                                id="nomeProduto"
                                placeholder="Nome"
                                @if(isset($produto)) value="{{ $produto->nome }}" @endif
                            >
                        </div>
                    </div>
                    <hr />
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="font-weight-bold h5" style="color: var(--gray-dark)">Preço</div>
                        </div>
                        <div class="col-10">
                            <input
                                type="text"
                                class="form-control"
                                name="precoProduto"
                                id="precoProduto"
                                placeholder="Preço"
                                @if(isset($produto)) value="{{ $produto->preco }}" @endif
                            >
                        </div>
                    </div>
                    <hr />
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="font-weight-bold h5" style="color: var(--gray-dark)">Estoque</div>
                        </div>
                        <div class="col-10">
                            <input
                                type="number"
                                class="form-control"
                                name="estoqueProduto"
                                id="estoqueProduto"
                                placeholder="Estoque"
                                @if(isset($produto)) value="{{ $produto->estoque }}" @endif
                            >
                        </div>
                    </div>
                    <hr />
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="font-weight-bold h5" style="color: var(--gray-dark)">Categoria</div>
                        </div>
                        <div class="col-10">
                            <select class="form-select form-control" name="categoriaProduto" id="categoriaProduto">
                                <option @if(!isset($produto))selected @endif>Selecione uma categoria</option>
                                @foreach($categorias as $categoria)
                                    <option
                                        value="{{ $categoria->id }}"
                                        @if(isset($produto) && $produto->categoria->id === $categoria->id) selected @endif
                                    >
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center justify-content-between px-2">
                        <button type="submit" class="btn btn-primary btn-sm"> @if(isset($produto)) Atualizar @else Salvar @endif</button>
                        <a href="{{ route('produtos.index') }}" class="btn btn-danger btn-sm">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
