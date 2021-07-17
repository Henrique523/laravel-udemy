@extends('layout.app')

@section('body')
    <div class="row mt-4">
        <div class="container col-md-8 offset-md-2">
            <div class="card border">
                <div class="card-header">
                    <div class="row align-items-center justify-content-between mx-4">
                        <div class="card-title">
                            Listagem de Clientes
                        </div>

                        <a href="{{ route('novo-cliente') }}" class="btn btn-primary text-white">Cadastrar Novo Cliente</a>
                    </div>
                </div>
                <div class="card-body">
                   <table class="table table-hover table-bordered" id="tabelaProdutos">
                       <thead>
                            <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Endereço</th>
                                    <th>Idade</th>
                                    <th>Email</th>
                            </tr>
                       </thead>

                       <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->endereco }}</td>
                                <td>{{ $cliente->idade }}</td>
                                <td>{{ $cliente->email }}</td>
                            </tr>
                        @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection
