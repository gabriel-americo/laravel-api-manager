<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Barryvdh\DomPDF\PDF;

class ExportController extends Controller
{
    public function exportarPDF()
    {
        $usuarios = Usuario::all(); // Obtenha os dados dos usuários

        // Renderize a view com os dados
        $pdf = PDF::loadView('pdf.usuarios', ['usuarios' => $usuarios]);

        // Faça o download do PDF
        return $pdf->download('usuarios.pdf');
    }
}
