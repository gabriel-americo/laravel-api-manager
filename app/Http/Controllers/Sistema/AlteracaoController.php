<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Alteracao;
use Illuminate\Http\Request;

class AlteracaoController extends Controller
{
    protected $alteracao;

    public function __construct(Alteracao $alteracao)
    {
        $this->alteracao = $alteracao;
    }

    public function changeStatus(Request $request)
    {
        $status = $request->input('status');
        $alteracaoId = $request->input('id');

        $alteracao = $this->alteracao->findOrFail($alteracaoId);

        if ($alteracao) {
            $alteracao->status = $status;
            $alteracao->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function createAlteracao(Request $request)
    {
        $data = $request->all();
        $data['status'] = '0';

        if ($data) {
            $this->alteracao->create($data);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
