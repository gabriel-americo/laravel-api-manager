<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Aprovacao;
use App\Models\AprovacaoImagem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImagemAprovacaoController extends Controller
{
    protected $imagens_aprovacoes;
    protected $aprovacoes;

    public function __construct(AprovacaoImagem $imagens_aprovacoes, Aprovacao $aprovacoes)
    {
        $this->aprovacoes = $aprovacoes;
        $this->imagens_aprovacoes = $imagens_aprovacoes;
    }

    public function createSubtitleImage(Request $request)
    {
        $imagemAprovacao = $this->imagens_aprovacoes->findOrFail($request->idImagem);
        $imagemAprovacao->legenda = $request->legenda;
        $imagemAprovacao->save();

        return response()->json(['success' => 'Legenda atualizada com sucesso.']);
    }

    public function uploadImages(Request $request)
    {
        $request->validate([
            'aprovacao_id' => 'required|exists:ideias,id',
            'imageFile.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $aprovacao = $this->aprovacoes->findOrFail($request->ideia_id);

        try {
            foreach ($request->file('imageFile') as $file) {
                $path = 'public/img/aprovacao/';
                $imageName = uniqid() . '-' . str_replace(" ", "-", trim($file->getClientOriginalName()));
                $file->storeAs($path, $imageName);
                $aprovacao->aprovacaoImagem()->create(['imagem' => $imageName]);
            }

            return response()->json(['success' => 'Imagem enviada com sucesso.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao fazer upload da imagem.']);
        }
    }

    public function downloadImage($id)
    {
        $dataImagem = $this->imagens_aprovacoes->findOrFail($id);

        if ($dataImagem) {
            $path = 'public/img/aprovacao/' . $dataImagem->imagem;

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

    public function deleteImage($id)
    {
        $imagemId = $this->imagens_aprovacoes->findOrFail($id);

        try {
            $path = public_path('storage/img/aprovacao/');
            $image_path = $path . $imagemId->imagem;

            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            $imagemId->delete();

            flash('Imagem removida com sucesso!')->success();
            return redirect()->back();
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            return redirect()->back();
        }
    }
}
