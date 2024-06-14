<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && $request->user()->roles->contains('name', 'Admin')) {
            return $next($request);
        }
    
        return redirect('login');
    }
}
