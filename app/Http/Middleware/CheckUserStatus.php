<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->status !== 'Ativo') {
            Auth::logout();

            return redirect()->route('login')->withErrors([
                'status' => 'Usuário desativado. Entre em contato com o administrador.',
            ]);
        }

        return $next($request);
    }
}
