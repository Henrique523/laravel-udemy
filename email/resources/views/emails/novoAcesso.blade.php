<html>
    <body>
        <h4>Seja bem vindo(a), {{ $nome }}!</h4>

        <p>Você abacou de acessar o sistema utilizando o seu email {{ $email }}</p>

        <p>Data/Hora de acesso: </p> {{ $dataHora }}

        <div>
            <img src="{{ $message->embed( public_path() . '/img/logo.png' ) }}" alt="" width="80" height="80">
        </div>
    </body>
</html>
