<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Ideia;
use App\Models\IdeiaImagem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImagemIdeiaController extends Controller
{
    protected $imagens_ideias;
    protected $ideias;

    public function __construct(IdeiaImagem $imagens_ideias, Ideia $ideias)
    {
        $this->ideias = $ideias;
        $this->imagens_ideias = $imagens_ideias;
    }

    public function createSubtitleImage(Request $request)
    {
        $imagemIdeia = $this->imagens_ideias->findOrFail($request->idImagem);
        $imagemIdeia->legenda = $request->legenda;
        $imagemIdeia->save();

        return response()->json(['success' => 'Legenda atualizada com sucesso.']);
    }

    public function uploadImages(Request $request)
    {
        $request->validate([
            'ideia_id' => 'required|exists:ideias,id',
            'imageFile.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $ideia = $this->ideias->findOrFail($request->ideia_id);

        try {
            foreach ($request->file('imageFile') as $file) {
                $path = 'public/img/ideias/';
                $imageName = uniqid() . '-' . str_replace(" ", "-", trim($file->getClientOriginalName()));
                $file->storeAs($path, $imageName);
                $ideia->ideiaImagem()->create(['imagem' => $imageName]);
            }

            return response()->json(['success' => 'Imagem enviada com sucesso.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao fazer upload da imagem.']);
        }
    }

    public function downloadImage($id)
    {
        $dataImagem = $this->imagens_ideias->findOrFail($id);

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

    public function deleteImage($id)
    {
        $imagemId = $this->imagens_ideias->findOrFail($id);

        try {
            $path = public_path('storage/img/ideias/');
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
