<html>
    <body>
        <h4>Seja bem vindo, {{ $nome }}</h4>

        <p>Você acabou de acessar o sistema utilizando seu email: {{ $email }}</p>

        <p>Data / hora de acesso: {{ $data/hora }}</p>

        <p>Clique no link abaixo para confirmar seu email de registro:</p>

        <a href="{{ $link }}">CLIQUE AQUI</a>
    </body>
</html>
