<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Ideia;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $ideiasNotificacao = Ideia::all(); // Buscar todas as ideias do banco de dados

        // Compartilhar $ideias com todas as views usando o método share do Laravel
        view()->share('ideias', $ideiasNotificacao);
    }
}
