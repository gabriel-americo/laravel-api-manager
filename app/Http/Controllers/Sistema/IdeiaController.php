<?php

namespace App\Http\Controllers\Sistema;

use App\Models\Ideia;
use App\Http\Requests\IdeiasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as Controller;

class IdeiaController extends Controller
{
    protected $ideias;

    public function __construct(Ideia $ideias)
    {
        $this->ideias = $ideias;
    }

    public function index()
    {
        $ideias = $this->ideias->with('aprovacao')->orderBy('data_inicio', 'asc')->get();
        $ideias = $this->setBadgeClasses($ideias);

        return view('sistema.ideias.index', compact('ideias'));
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

        return view('sistema.ideias.create', compact('autoPergunta'));
    }

    public function store(IdeiasRequest $request)
    {
        $data = $request->validated();

        try {
            $ideia = $this->ideias->create($data);

            foreach ($request->grupo_perguntas as $values) {
                $ideia->perguntas()->create([
                    'pergunta' => $values['pergunta'],
                    'resposta' => $values['resposta'],
                    'usuario_id' => Auth::user()->id
                ]);
            }

            flash('Ideia cadastrada com sucesso!')->success();
            return redirect()->route('ideias.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $ideias = $this->ideias->with('aprovacao', 'ideiaImagem', 'ideiaPergunta')->findOrFail($id);

        return view('sistema.ideias.show', compact('ideias'));
    }

    public function edit($id)
    {
        $ideia = $this->ideias->with('aprovacao', 'ideiaImagem', 'ideiaPergunta')->findOrFail($id);
        $count = $ideia->ideiaPergunta()->count();

        $checked = ($ideia['status'] == 'Ativa' ? 'checked="checked"' : '');
        $status = ($ideia['status'] == 'Ativa' ? '1' : '0');

        return view('sistema.ideias.edit', compact('ideia', 'checked', 'status', 'count'));
    }

    public function update(IdeiasRequest $request, $id)
    {
        $data = $request->only(['nome', 'descricao', 'data_inicio', 'data_entrega', 'data_lancamento', 'criador', 'status']);

        try {
            $ideia = $this->ideias->findOrFail($id);
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

            flash('Ideia atualizada com sucesso!')->success();
            return redirect()->route('ideias.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $ideia = $this->ideias->findOrFail($id);

        try {
            $ideia->delete();

            flash('ideia removida com sucesso!')->success();
            return redirect()->route('ideias.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            return redirect()->back();
        }
    }

    public function multiDelete(Request $request)
    {
        $this->ideias->whereIn('id', $request->get('selected'))->delete();

        return response("Ideias selecionadas excluídas com sucesso.", 200);
    }

    public function createImages($id)
    {
        $ideia = $this->ideias->with('aprovacao', 'ideiaImagem', 'ideiaPergunta')->findOrFail($id);

        return view('sistema.ideias.images', compact('ideia'));
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
