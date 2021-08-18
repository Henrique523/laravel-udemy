<html>
    <head>
        <style>
            table {
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Categorias</td>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>
                        <ul>
                            @foreach($produto->categorias as $categoria)
                                <li>{{ $categoria->nome }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
