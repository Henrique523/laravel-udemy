@extends('layout.app', ["current" => "categorias"])

@section('body')
<div class="card border">
    <div class="card-body">
        <form
            @if(isset($categoria))
                action="/categorias/{{ $categoria->id }}"
            @else
                action="/categorias"
            @endif
            method="POST"
        >
            @csrf
            @if(isset($categoria))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="nomeCategoria">Nome da Categoria</label>
                <input
                    type="text"
                    class="form-control"
                    name="nomeCategoria"
                    id="nomeCategoria"
                    placeholder="Categoria"
                    @if(isset($categoria)) value="{{$categoria->nome}}" @endif
                >
            </div>
            <button type="submit" class="btn btn-primary btn-sm"> @if(isset($categoria)) Atualizar @else Salvar @endif</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div>
</div>
@endsection
