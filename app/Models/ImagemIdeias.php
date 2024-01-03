<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagemIdeias extends Model
{
    protected $table='imagem_ideias';

    protected $fillable = ['legenda', 'imagem', 'ideias_id'];

    public function ideias()
    {
        return $this->belongsTo(Ideia::class, 'ideias_id', 'id');
    }
}
