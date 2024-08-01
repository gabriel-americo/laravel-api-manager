<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (in_array($lang, ['en', 'pt_BR'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return redirect()->back();
    }
}
