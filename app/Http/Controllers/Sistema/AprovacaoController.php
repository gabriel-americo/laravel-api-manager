<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aprovacao;
use App\Models\Ideia;

class AprovacaoController extends Controller
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
        $aprovacoes = $this->aprovacao->with('ideia')->get();

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

        $data['status'] = $request->has('status');

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
    $aprovacao = $this->aprovacao->with('ideias', 'imagemAprovacao', 'alteracao.usuarios', 'resposta.usuarios')
        ->findOrFail($id);

    $status = $aprovacao->alteracao->where('status', 1)->count();
    $total = $aprovacao->alteracao->count();

    $porcentagem = $total != 0 ? round($status * 100 / $total) : 0;

    return view('sistema.aprovacao.show', compact('aprovacao', 'porcentagem'));
}

    public function edit(string $id)
    {
        $aprovacao = $this->aprovacao->findOrFail($id);
        $ideias = $this->ideia->all();
        $status = $aprovacao->status === 'Ativo' ? '1' : '0';

        return view('sistema.aprovacoes.edit', compact('aprovacao', 'ideias', 'status'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $aprovacao = $this->aprovacao->findOrFail($id);

        try {
            $data['status'] = (isset($data['status']) == '1' ? '1' : '0');
            $aprovacao->update($data);

            flash('Aprovação atualizada com sucesso!')->success();

            return redirect()->route('aprovacao.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();

            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        $aprovacao = $this->aprovacao->findOrFail($id);

        try {
            $aprovacao->delete();

            flash('Aprovação removida com sucesso!')->success();

            return redirect()->route('aprovacao.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();

            return redirect()->back();
        }
    }

    public function multiDelete(Request $request)
    {
        $this->aprovacao->whereIn('id', $request->get('selected'))->delete();

        return response("Aprovações selecionadas excluídas com sucesso.", 200);
    }
}
