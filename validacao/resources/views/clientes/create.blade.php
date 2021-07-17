@extends('layout.app')

@section('body')
    <div class="row mt-4">
        <div class="container col-md-8 offset-md-2">
            <div class="card border">
                <div class="card-header">
                    <div class="card-title">
                        Cadastro de Cliente
                    </div>
                </div>
                <div class="card-body">
                    <form action="/cliente" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome do Cliente</label>
                            <input type="text" id="nome" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome do cliente">
                            @error('nome')
                            <div class="invalid-feedback">
                                {{ $errors->first('nome') }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nome">Idade do Cliente</label>
                            <input
                                type="number"
                                id="idade"
                                class="form-control @error('idade') is-invalid @enderror"
                                name="idade"
                                placeholder="Idade do cliente"
                            >
                            @error('nome')
                            <div class="invalid-feedback">
                                {{ $errors->first('idade') }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço do Cliente</label>
                            <input
                                type="text"
                                id="endereco"
                                class="form-control @error('endereco') is-invalid @enderror"
                                name="endereco"
                                placeholder="Endereço do cliente"
                            >
                            @error('nome')
                            <div class="invalid-feedback">
                                {{ $errors->first('endereco') }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail do Cliente</label>
                            <input
                                type="text"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                placeholder="E-mail do cliente"
                            >
                            @error('nome')
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
