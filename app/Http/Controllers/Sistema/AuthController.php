<?php

namespace App\Http\Controllers\Sistema;

use App\Events\UserLoggedIn;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Se o usuário estiver autenticado, ele será redirecionado automaticamente para o painel.
        return view('sistema.login');
    }

    public function dashboard()
    {
        // Se o usuário não estiver autenticado, ele será redirecionado automaticamente para a página de login.
        return view('sistema.dashboard');
    }

    public function login(Request $request)
    {
        // Valida os campos de entrada.
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ], [
            'login.required' => 'O campo de login é obrigatório.',
            'password.required' => 'O campo de senha é obrigatório.',
        ]);

        // Determina o tipo de login com base no formato (email ou usuário).
        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'user';

        $credentials = [
            $loginType => $request->input('login'),
            'password' => $request->input('password'),
        ];

        // Tenta autenticar o usuário.
        if (Auth::attempt($credentials)) {
            event(new UserLoggedIn(Auth::user())); // Dispara o evento UserLoggedIn
            return redirect()->route('dashboard');
        }

        // Redireciona de volta com mensagens de erro, se a autenticação falhar.
        return redirect()->back()->withInput()->withErrors([
            'Os dados informados não conferem!'
        ]);
    }

    public function logout()
    {
        // Faz logout do usuário e redireciona para o login.
        Auth::logout();
        return redirect()->route('login');
    }

    public function permissionDenied()
    {
        // Exibe a página de permissão negada.
        return view('permission-denied');
    }

    public function redirect()
    {
        // Redireciona para a página de login.
        return redirect()->route('login');
    }
}
