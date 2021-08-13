<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">

        <title>Paginação</title>
        <style>
            body {
                padding: 20px;
            }
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="card text-center rounded">
                <div class="card-header">Tabela de Clientes</div>
                <div class="card-body">
                    <table class="table table-hover" id="tabela-clientes">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">E-mail</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <nav id="paginator">
                        <ul class="pagination">
                            {{-- <li class="page-item"><a class="page-link" href="#">{{ '<' }}</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">{{ '>' }}</a></li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            function montarLinha(data) {
                return `<tr>
                            <td>${data.id}</td>
                            <td>${data.nome}</td>
                            <td>${data.sobrenome}</td>
                            <td>${data.email}</td>
                        </tr>`;
            }

            function montarTabela(response) {
                $('#tabela-clientes>tbody>tr').remove();
                response.data.forEach(data => {
                    const newLine = montarLinha(data);
                    $('#tabela-clientes>tbody').append(newLine);
                })
            }

            function montarItemPaginacao(response, pagina) {
                return `<li class="page-item ${pagina === response.current_page ? 'active' : ''}">
                            <a class="page-link" href="#">${pagina}</a>
                        </li>`;
            }

            function montarItemNextOuPrevious(whatIs, response) {
                return whatIs === 'previous' ?
                    `<li class="page-item ${response.current_page === 1 ? 'disabled' : ''}">
                        <a class="page-link" href="#">{{ '<' }}</a>
                    </li>` :
                    `<li class="page-item ${response.current_page === response.last_page ? 'disabled' : ''}">
                        <a class="page-link" href="#">{{ '>' }}</a>
                    </li>`
            }

            function montarPaginator(response) {
                montarNextOrPrevious('previous', response);

                let inicio = 1;
                let fim = 10;
                for (let i = inicio; i <= fim; i++) {
                    const linkPagina = montarItemPaginacao(response, i);
                    $('#paginator>ul').append(linkPagina);
                }

                montarNextOrPrevious('next', response);
            }

            function montarNextOrPrevious(whatIs, response) {
                if (whatIs === 'previous') {
                    $('#paginator>ul>li').remove();
                }

                const elemento = montarItemNextOuPrevious(whatIs, response);
                $('#paginator>ul').append(elemento);
            }

            function carregarclientes(pagina) {
                $.get('/json', { page: pagina }, function(response) {
                    montarTabela(response);
                    montarPaginator(response);
                });
            }

            $(function() {
                carregarclientes(8);
            });
        </script>
    </body>
</html>
