<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Events\UserLoggedIn;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    // Exibe o formulário de login
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('admin.auth.login');
    }

    // Exibe o dashboard após o login
    public function dashboard() : View
    {
        return view('admin.dashboard');
    }

    // Processa a tentativa de login do usuário
    public function store(LoginRequest $request)
    {
        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'user';

        $credentials = [
            $loginType => $request->input('login'),
            'password' => $request->input('password'),
        ];

        // Tenta autenticar o usuário.
        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withInput()->withErrors([
                'login' => __('auth.failed')
            ]);
        }

        // Dispara o evento UserLoggedIn
        event(new UserLoggedIn(Auth::user()));

        return redirect()->route('dashboard');
    }

    // Faz logout do usuário e redireciona para o login.
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Exibe a página de permissão negada.
    public function permissionDenied() : View
    {
        return view('permission-denied');
    }

    // Redireciona para a página de login.
    public function redirect()
    {
        return redirect()->route('login');
    }
}
