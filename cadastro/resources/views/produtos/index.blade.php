@extends('layout.app', ["current" => "produtos"])

@section('body')
    <h3 class="card-title mb-4">Cadastro de Produtos</h3>
    <div class="card border">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary btn-new-product" onclick="novoProduto()">Novo Produto</button>
        </div>
        <div class="card-body">
            <table class="table table-ordered table-striped table-hover" id="tabelaProdutos">
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

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" tabindex="-1"  id="dlgProdutos">
{{--    <div class="modal fade" id="dlgProdutos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">

                        <div class="form-group">
                            <label for="nomeProduto">Descrição do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precoProduto">Preço do Produto</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="precoProduto" placeholder="Preço do Produto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="estoqueProduto">Quantidade</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="estoqueProduto" placeholder="Quantidade">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categoriaProduto">Descrição do Produto</label>
                            <div class="input-group">
                                <select class="form-control" id="categoriaProduto"></select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <button type="cancel" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                }
            });
            carregaCategorias();
            carregaProdutos();

            $('#formProduto').submit(function (event) {
                event.preventDefault();
                if($("#id").val() == '') {
                    criarProduto();
                } else {
                    salvarProduto();
                }


                $('#dlgProdutos').modal('hide');
            });
        })
        function novoProduto() {
            $('#id').val('');
            $('#nomeProduto').val('');
            $('#precoProduto').val('');
            $('#estoqueProduto').val('');

            $('#dlgProdutos').modal('show');
        }

        function carregaCategorias() {
            $.getJSON('/api/categorias', function (data) {
                data.forEach(option => {
                    let opcao = `<option value="${option.id}">${option.nome}</option>`;
                    $('#categoriaProduto').append(opcao);
                })
            })
        }

        function carregaProdutos() {
            $.getJSON('/api/produtos', function(data) {
                data.forEach(produto => {
                    const rowColumn = montaLinhaTabela(produto);
                    $('#tabelaProdutos>tbody').append(rowColumn);
                })
            })
        }

        function criarProduto() {
            const form = {
                nomeProduto: $('#nomeProduto').val(),
                precoProduto: $('#precoProduto').val(),
                estoqueProduto: $('#estoqueProduto').val(),
                categoriaProduto: $('#categoriaProduto').val()
            };

            $.post('/api/produtos', form, function(data) {
                const novaLinha = montaLinhaTabela(data);
                $('#tabelaProdutos>tbody').append(novaLinha);
            });
        }

        function salvarProduto() {
            const id = $('#id').val();

            const produto = {
                nomeProduto: $('#nomeProduto').val(),
                precoProduto: $('#precoProduto').val(),
                estoqueProduto: $('#estoqueProduto').val(),
                categoriaProduto: $('#categoriaProduto').val()
            };

            $.ajax({
                type: 'PUT',
                url: `/api/produtos/${id}`,
                data: produto,
                context: this,
                success: function(data) {
                    const jsonData = JSON.parse(data);
                    const arrayLinesTable = $('#tabelaProdutos>tbody>tr');
                    const selectedRow = arrayLinesTable.filter(function (i, element) {
                        return element.cells[0].textContent == id;
                    });
                    if (selectedRow) {
                        selectedRow[0].cells[1].textContent = jsonData.nome;
                        selectedRow[0].cells[2].textContent = jsonData.estoque;
                        selectedRow[0].cells[3].textContent = jsonData.preco;
                        selectedRow[0].cells[4].textContent = jsonData.categoria.nome;
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }

        function montaLinhaTabela(dadoLinha) {
            const columns = ['id', 'nome', 'estoque', 'preco'];

            let rowColumn = '<tr>';
            columns.forEach(columnName => {
                rowColumn += `<td class="text-center">${dadoLinha[columnName]}</td>`;
            })
            rowColumn += `<td class="text-center">${dadoLinha.categoria ? dadoLinha.categoria.nome : ''}</td>`;
            rowColumn += `<td class="text-center">
                                    <button class="btn btn-sm btn-primary btn-lg fa fa-edit" onclick="editar(${dadoLinha.id})"></button>
                                    <button class="btn btn-sm btn-danger btn-lg fa fa-trash" onclick="remover(${dadoLinha.id})"></button>
                                  </td>`;
            rowColumn += `</tr>`;

            return rowColumn;
        }

        function remover(id) {
            $.ajax({
                type: 'DELETE',
                url: `/api/produtos/${id}`,
                context: this,
                success: function() {
                    const arrayLinesTable = $('#tabelaProdutos>tbody>tr');
                    const selectedRow = arrayLinesTable.filter(function (i, element) {
                        return element.cells[0].textContent == id;
                    });
                    selectedRow.remove();
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }

        function editar(id) {
            $.getJSON(`/api/produtos/${id}`, function (data) {
                $('#id').val(data.id);
                $('#nomeProduto').val(data.nome);
                $('#precoProduto').val(data.preco);
                $('#estoqueProduto').val(data.estoque);
                $('#categoriaProduto').val(data.categoria_id);

                $('#dlgProdutos').modal('show');
            })
        }
    </script>
@endsection
