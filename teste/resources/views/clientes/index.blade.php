<h3>{{ $titulo }}:</h3>
<a href="{{ route('clientes.create') }}">NOVO CLIENTE</a>
<ol>
    @foreach ($clientes as $cliente)
        <li>
            {{ $cliente['nome'] }} |
            <a href="{{ route('clientes.edit', $cliente['id']) }}">Editar</a> |
            <a href="{{ route('clientes.show', $cliente['id']) }}">Info</a> |

            <form action="{{ route('clientes.destroy', $cliente['id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Apagar">
            </form>

        </li>
    @endforeach
</ol>
