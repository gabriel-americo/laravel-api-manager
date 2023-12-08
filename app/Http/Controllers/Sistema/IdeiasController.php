<?php

namespace App\Http\Controllers\Sistema;

use App\Models\Ideias;
use App\Models\ImagemIdeias;
use App\Models\PerguntasIdeias;

use App\Http\Requests\IdeiasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as Controller;

class IdeiasController extends Controller
{
    protected $ideias;

    public function __construct(Ideias $ideias)
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
        try {
            $data = $request->validated();
            $data['criador'] = Auth::user()->id;

            $ideia = $this->ideias->create($data);

            foreach ($request->grupo_perguntas as $values) {
                $ideia->perguntas()->create([
                    'perguntas' => $values['pergunta'],
                    'respostas' => $values['resposta'],
                    'usuarios_id' => $data['criador']
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
        $ideias = $this->ideias->with('aprovacao', 'images', 'perguntas')->findOrFail($id);

        return view('sistema.ideias.show', compact('ideias'));
    }

    public function edit($id)
    {
        $ideias = $this->ideias->findOrFail($id);
        $count = $ideias->perguntas()->count();

        $checked = ($ideias['status'] == 'Ativa' ? 'checked="checked"' : '');
        $status = ($ideias['status'] == 'Ativa' ? '1' : '0');

        return view('sistema.ideias.edit', compact('ideias', 'checked', 'status', 'count'));
    }

    public function update(IdeiasRequest $request, $id)
    {
        $data = $request->only(['nome', 'descricao', 'data_inicio', 'data_entrega', 'data_lancamento', 'criador', 'status']);
        $ideia = $this->ideias->findOrFail($id);
        $user_id = Auth::user()->id;

        try {
            $ideia->update($data);

            foreach ($request->grupo_perguntas as $i => $values) {
                $idPergunta = PerguntasIdeias::where('ideias_id', $id)->pluck('id')->toArray();

                if (empty($idPergunta[$i])) {
                    $ideia->perguntas()->create(['perguntas' => $values['pergunta'], 'respostas' => $values['resposta'], 'usuarios_id' => $user_id]);
                } else {
                    $ideia->perguntas()->where('id', $idPergunta[$i])->update(['perguntas' => $values['pergunta'], 'respostas' => $values['resposta']]);
                }
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
        $imagemId = ImagemIdeias::where('ideias_id', $id);
        $perguntasId = PerguntasIdeias::where('ideias_id', $id);

        try {
            $ideia->delete();
            $imagemId->delete();
            $perguntasId->delete();

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
