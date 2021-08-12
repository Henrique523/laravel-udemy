<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $authOk = Auth::guard('admin')->attempt($credentials, $request->input('remember'));

        if ($authOk) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInputs($request->only('email', 'remember'));
    }

    public function index()
    {
        return view('auth.admin-login');
    }
}
