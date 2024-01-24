<?php

namespace App\Http\Controllers\Sistema;

use App\Models\Ideia;
use App\Models\ImagemIdeia;
use App\Models\PerguntaIdeia;

use App\Http\Requests\IdeiasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Storage;

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
        try {
            $data = $request->validated();
            $data['criador'] = Auth::user()->id;

            $ideia = $this->ideias->create($data);

            foreach ($request->grupo_perguntas as $values) {
                $ideia->perguntas()->create([
                    'pergunta' => $values['pergunta'],
                    'resposta' => $values['resposta'],
                    'usuario_id' => $data['criador']
                ]);
            }

            flash('Ideia cadastrada com sucesso!')->success();

            return redirect()->route('ideias.edit', ['id' => $ideia->id]);
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
        $ideia = $this->ideias->with('aprovacao', 'images', 'perguntas')->findOrFail($id);
        $count = $ideia->perguntas()->count();

        $checked = ($ideia['status'] == 'Ativa' ? 'checked="checked"' : '');
        $status = ($ideia['status'] == 'Ativa' ? '1' : '0');

        return view('sistema.ideias.edit', compact('ideia', 'checked', 'status', 'count'));
    }

    public function update(IdeiasRequest $request, $id)
    {
        $data = $request->only(['nome', 'descricao', 'data_inicio', 'data_entrega', 'data_lancamento', 'criador', 'status']);
        $ideia = $this->ideias->findOrFail($id);
        $user_id = Auth::user()->id;

        try {
            $ideia->update($data);

            foreach ($request->grupo_perguntas as $i => $values) {
                $idPergunta = PerguntaIdeia::where('ideia_id', $id)->pluck('id')->toArray();

                if (empty($idPergunta[$i])) {
                    $ideia->perguntas()->create(['pergunta' => $values['pergunta'], 'resposta' => $values['resposta'], 'usuarios_id' => $user_id]);
                } else {
                    $ideia->perguntas()->where('id', $idPergunta[$i])->update(['pergunta' => $values['pergunta'], 'resposta' => $values['resposta']]);
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
        $imagemId = ImagemIdeia::where('ideia_id', $id);
        $perguntasId = PerguntaIdeia::where('ideia_id', $id);

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

    public function download($id)
    {
        $dataImagem = ImagemIdeia::findOrFail($id);

        if ($dataImagem) {
            $path = 'public/img/ideias/' . $dataImagem->imagem;

            // Verifica se o arquivo existe no armazenamento (storage)
            if (Storage::exists($path)) {
                // Define o nome do arquivo para download
                $fileName = basename($dataImagem->imagem);

                // Realiza o download do arquivo
                return response()->download(storage_path('app/' . $path), $fileName);
            }
        }

        // Caso o arquivo não exista, retorne uma resposta adequada (por exemplo, redirecione ou exiba uma mensagem de erro)
        return redirect()->back()->with('error', 'A imagem não está disponível para download.');
    }

    public function createImages($id)
    {
        $ideia = $this->ideias->with('aprovacao', 'images', 'perguntas')->findOrFail($id);

        return view('sistema.ideias.images', compact('ideia'));
    }

    public function uploadImages(Request $request)
    {
        $request->validate([
            'ideia_id' => 'required|exists:ideias,id',
            'imageFile.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $ideia = $this->ideias->findOrFail($request->ideia_id);

            foreach ($request->file('imageFile') as $file) {
                $path = 'public/img/ideias/';
                $imageName = uniqid() . '-' . str_replace(" ", "-", trim($file->getClientOriginalName()));
                $file->storeAs($path, $imageName);
                $ideia->images()->create(['imagem' => $imageName]);
            }

            return response()->json(['success' => 'Imagem enviada com sucesso.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao fazer upload da imagem.']);
        }
    }

    public function createSubtitleImage(Request $request)
    {
        $imagemIdeia = ImagemIdeia::findOrFail($request->idImagem);
        $imagemIdeia->legenda = $request->legenda;
        $imagemIdeia->save();

        return response()->json(['success' => 'Legenda atualizada com sucesso.']);
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
