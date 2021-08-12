@auth
@php $user = auth()->user() @endphp
    <h4>ID {{ $user->id }}</h4>
    <h4>Usuário {{ $user->name }}</h4>
    <h4>Email {{ $user->email }}</h4>
@endauth

@guest
    <h4>Você não está logado</h4>
@endguest
