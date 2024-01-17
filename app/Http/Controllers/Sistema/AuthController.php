<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Events\UserLoggedIn;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('sistema.login');
    }

    // Exibe o dashboard após o login
    public function dashboard()
    {
        return view('sistema.dashboard');
    }

    // Processa a tentativa de login do usuário
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
        if (!Auth::attempt($credentials)) {
            // Redireciona de volta com mensagens de erro, se a autenticação falhar.
            return redirect()->back()->withInput()->withErrors([
                'Os dados informados não conferem!'
            ]);
        }

        // Verifica se o usuário está ativo.
        if (!Auth::check() || Auth::user()->status !== 'Ativo') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'status' => 'Usuário desativado. Entre em contato com o administrador.',
            ]);
        }

        // Dispara o evento UserLoggedIn
        event(new UserLoggedIn(Auth::user()));

        // Redireciona para o dashboard.
        return redirect()->route('dashboard');
    }

    // Faz logout do usuário e redireciona para o login.
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Exibe a página de permissão negada.
    public function permissionDenied()
    {
        return view('permission-denied');
    }

    // Redireciona para a página de login.
    public function redirect()
    {
        return redirect()->route('login');
    }
}
