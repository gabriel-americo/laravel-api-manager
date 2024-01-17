<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\ImagemIdeias;
use App\Models\Ideias;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImagemIdeiaController extends Controller
{
    protected $ideia;
    protected $imagemIdeia;

    public function __construct(Ideia $ideia, ImagemIdeias $imagemIdeia)
    {
        $this->ideia = $ideia;
        $this->imagemIdeia = $imagemIdeia;
    }

    public function createImages($id)
    {
        $ideia = Ideia::findOrFail($id);
        $imagemIdeia = ImagemIdeias::where('ideias_id',$id)->get();

        return view('sistema.ideias.imagem-ideias.create', compact('ideia', 'imagemIdeia'));
    }

    public function createLegendaIdeia(Request $request)
    {
        $imagemIdeia = $this->imagemIdeia->findOrFail($request->idImagem);
        $imagemIdeia->legenda = $request->legenda;
        $imagemIdeia->save();
    }

    public function uploadImages(Request $request)
    {
        $request->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf'
        ]);

        $ideia = $this->ideia->findOrFail($request->id);

        try
        {
            if($request->hasfile('imageFile')) {
                $path = '/img/ideias/';

                foreach($request->file('imageFile') as $file)
                {
                    $imageName = uniqid() . '-' . trim($file->getClientOriginalName());
                    $file->storeAs($path, $imageName);
                    $imgData[] = $imageName;
                }

                foreach($imgData as $i => $values) {
                    $ideia->images()->create(['imagem' => $values]);
                }

                flash('Upload realizado com sucesso!')->success();

                return redirect()->back();
            }
        } catch(\Exception $e) {
            flash($e->getMessage())->warning();

            return redirect()->back();
        }
    }

    public function getDownload($imageId)
    {
        $imagemIdeia = ImagemIdeias::where('id', $imageId)->firstOrFail();
        $path =  '/img/ideias/'. $imagemIdeia->imagem;

        return Storage::download($path, $imagemIdeia->imagem, ['Content-Type' => 'jpg']);
    }

    public function deleteImage(Request $request, $id)
    {
        $imagemId = ImagemIdeias::where('id', $id)->first();
        $idIdeia = $request->route('idIdeia');

        try
        {
            $path = public_path('storage/img/ideias/');
            $image_path = $path.$imagemId->imagem;

            File::delete($image_path);

            $imagemId->delete();

            flash('Imagem removida com sucesso!')->success();

            return redirect()->route('ideias.imagem-ideias', ['id' => $idIdeia]);

        } catch (\Exception $e) {
            flash($e->getMessage())->warning();

            return redirect()->back();
        }
    }
}
