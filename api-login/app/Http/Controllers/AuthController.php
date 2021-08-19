<?php

namespace App\Http\Controllers;

use App\Events\EventNovoRegistro;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'token' => Str::random(60),
        ]);

        $user->save();

        event(new EventNovoRegistro($user));

        return response()->json(['res' => 'Usuario criado com sucesso'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credenciais = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'active' => 1,
        ];

        if (! Auth::attempt($$credenciais)) {
            return response()->json(['res' => 'Acesso negado'], 401);
        };

        $user = $request->user();
        $token = $user->createToken('Token de acesso')->accessToken();

        return response()->json([
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['res' => 'Deslogado com sucesso']);
    }

    public function ativarRegistro(User $user, string $token)
    {
        if ($user->token === $token) {
            $user->update([
                'active' => true,
                'token' => '',
            ]);

            return view('registroAtivo');
        }

        return view('registroErro');
    }
}
