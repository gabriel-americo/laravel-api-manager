<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = Session::get('locale', 'pt_BR');
        Session::put('locale', $locale);
        App::setLocale($locale);

        $languages = config('languages');

        if (!isset($languages[$locale])) {
            $locale = 'pt_BR'; 
        }

        $languageConfig = $languages[$locale];

        View::share('locale', $locale);
        View::share('languageConfig', $languageConfig);

        return $next($request);
    }
}
