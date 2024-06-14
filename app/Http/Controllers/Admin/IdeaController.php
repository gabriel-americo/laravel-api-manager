<?php

namespace App\Http\Controllers\Admin;

use App\Models\Idea;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    protected $ideas;

    public function __construct(Idea $ideas)
    {
        $this->ideas = $ideas;
    }

    public function index()
    {
        $ideas = $this->ideas->with('aprovalls')->orderBy('start_date', 'asc')->get();
        $ideas = $this->setBadgeClasses($ideas);

        return view('admin.ideas.index', compact('ideas'));
    }

    public function create()
    {
        $autoPergunta = array(
            'pergunta1' => 'Tamanho da arte no papel? E qual posição da folha na horizontal ou vertical?',
            'pergunta2' => 'Qual o tipo de serigrafia? Chapado, quadricromia ou simulado?',
            'pergunta3' => 'Quantas cores terá o desenho?',
            'pergunta4' => 'Em qual cor de camiseta será estampado?',
            'pergunta5' => 'Estilo de traço do desenho (mangá, estilo simpsons, pintura digital realista, pixel)?',
            'pergunta6' => 'Quais personagens deverão ser desenhados?',
            'pergunta7' => 'Qual a posição dos personagens? (de corpo inteiro, só a cabeça, sorrindo, triste, etc)?',
            'pergunta8' => 'O que deverá se destacar na arte?',
            'pergunta9' => 'Terá alguma frase?',
        );

        return view('admin.ideas.create', compact('autoPergunta'));
    }

    public function store(Request $request)
    {
        $data = $request->validated();

        try {
            $ideia = $this->ideas->create($data);

            foreach ($request->grupo_perguntas as $values) {
                $ideia->perguntas()->create([
                    'pergunta' => $values['pergunta'],
                    'resposta' => $values['resposta'],
                    'usuario_id' => Auth::user()->id
                ]);
            }

            return redirect()->route('ideas.index')->with('success', 'Ideia cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $idea = $this->ideas->with('aprovacao', 'ideiaImagem', 'ideiaPergunta')->findOrFail($id);

        return view('admin.ideias.show', compact('idea'));
    }

    public function edit($id)
    {
        $ideia = $this->ideas->with('aprovacao', 'ideiaImagem', 'ideiaPergunta')->findOrFail($id);
        $count = $ideia->ideiaPergunta()->count();

        $checked = ($ideia['status'] == 'Ativa' ? 'checked="checked"' : '');
        $status = ($ideia['status'] == 'Ativa' ? '1' : '0');

        return view('admin.ideias.edit', compact('ideia', 'checked', 'status', 'count'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['nome', 'descricao', 'data_inicio', 'data_entrega', 'data_lancamento', 'criador', 'status']);

        try {
            $ideia = $this->ideas->findOrFail($id);
            $ideia->update($data);

            foreach ($request->grupo_perguntas as $values) {
                $ideia->ideiaPergunta()->updateOrCreate(
                    ['id' => $values['id']],
                    [
                        'pergunta' => $values['pergunta'],
                        'resposta' => $values['resposta']
                    ]
                );
            }

            return redirect()->route('ideias.index')->with('success', 'Ideia atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $ideia = $this->ideas->findOrFail($id);

        try {
            $ideia->delete();

            return redirect()->route('ideas.index')->with('success', 'Ideia removida com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function multiDelete(Request $request)
    {
        $this->ideas->whereIn('id', $request->get('selected'))->delete();

        return response("Ideias selecionadas excluídas com sucesso.", 200);
    }

    public function createImages($id)
    {
        $ideia = $this->ideas->with('aprovacao', 'ideiaImagem', 'ideiaPergunta')->findOrFail($id);

        return view('admin.ideias.images', compact('ideia'));
    }

    private function setBadgeClasses($ideias)
    {
        foreach ($ideias as $ideia) {
            $ideia->class = $this->getBadgeClass($ideia);
        }

        return $ideias;
    }

    private function getBadgeClass($ideia)
    {
        $status = $ideia['status'];
        $dataEntrega = strtotime($ideia['data_entrega']);
        $currentDate = strtotime(date('Y/m/d'));

        if ($status == "Iniciar" && $dataEntrega < $currentDate || $status == "Em Andamento" && $dataEntrega < $currentDate) {
            return "badge badge-light-danger";
        } elseif ($status == "Em Andamento" || $status == "Iniciar") {
            return "badge badge-light-warning";
        } else {
            return "badge badge-light-success";
        }
    }
}
