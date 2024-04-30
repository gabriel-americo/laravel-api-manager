<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aprovacao;
use App\Models\Ideia;
use App\Models\Resposta;

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
        $ideias = $this->ideia->doesntHave('aprovacao')->select('id', 'nome')->get();

        return view('sistema.aprovacoes.create', compact('ideias'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['status'] = $request->has('status');

        try {
            $this->aprovacao->create($data);

            flash('Aprovação cadastrada com sucesso!')->success();

            return redirect()->route('aprovacoes.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();

            return redirect()->back();
        }
    }

    public function show(string $id)
    {
        $aprovacao = $this->aprovacao->with(['ideia', 'images', 'alteracoes.usuario'])->findOrFail($id);

        $alteracao = $aprovacao->alteracoes()->orderBy('id', 'desc')->get();

        $resposta = Resposta::with(['usuario', 'alteracao'])->orderBy('id', 'desc')->get();

        $status = $alteracao->where('status', 1)->count();
        $total = $alteracao->count();

        $class = $aprovacao->status == "Sim" ? "success" : "danger";

        $checked = $aprovacao->status == 'Sim' ? 'checked' : '';

        $porcentagem = $total != 0 ? round($status * 100 / $total) : 0;

        return view('sistema.aprovacoes.show', compact('aprovacao', 'resposta', 'alteracao', 'porcentagem', 'class', 'checked'));
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

            return redirect()->route('aprovacoes.index');
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

            return redirect()->route('aprovacoes.index');
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

    public function createImages($id)
    {
        $aprovacao = $this->aprovacao->findOrFail($id);

        return view('sistema.aprovacoes.images', compact('aprovacao'));
    }

    public function uploadImages(Request $request)
    {
        $request->validate([
            'aprovacao_id' => 'required|exists:ideias,id',
            'imageFile.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $aprovacao = $this->aprovacao->findOrFail($request->aprovacao_id);

            foreach ($request->file('imageFile') as $file) {
                $path = 'public/img/aprovacoes/';
                $imageName = uniqid() . '-' . str_replace(" ", "-", trim($file->getClientOriginalName()));
                $file->storeAs($path, $imageName);
                $aprovacao->aprovacaoImagem()->create(['imagem' => $imageName]);
            }

            return response()->json(['success' => 'Imagem enviada com sucesso.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao fazer upload da imagem.']);
        }
    }

    public function updateStatus(Request $request)
    {
        $status = $request->input('status');
        $aprovacaoId = $request->input('id');

        $aprovacao = $this->aprovacao->findOrFail($aprovacaoId);

        if ($aprovacao) {
            $aprovacao->status = $status;
            $aprovacao->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
