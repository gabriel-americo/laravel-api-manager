<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aprovacao;
use App\Models\Ideia;

class AprovacoesController extends Controller
{

    protected $aprovacao;
    protected $ideia;

    public function __construct(Aprovacao $aprovacao, Ideia $ideia)
    {
        $this->aprovacao = $aprovacao;
        $this->ideia = $ideia;
    }

    public function index()
    {
        $aprovacoes = $this->aprovacao->with('ideias')->get();

        return view('sistema.aprovacoes.index', compact('aprovacoes'));
    }


    public function create()
    {
        $ideias = $this->ideia->doesntHave('aprovacao')
            ->select('id', 'nome')
            ->get();

        return view('sistema.aprovacoes.create', compact('ideias'));
    }


    public function store(Request $request)
    {
        $data = $request->all();


        $data['status'] = $request->has('status') ? '1' : '0';

        try {
            $this->aprovacao->create($data);

            flash('Aprovação cadastrada com sucesso!')->success();

            return redirect()->route('aprovacao.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();

            return redirect()->back();
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
