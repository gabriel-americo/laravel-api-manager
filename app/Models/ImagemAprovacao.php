<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagemAprovacao extends Model
{
    protected $table='imagem_aprovacao';

    protected $fillable = ['imagem', 'aprovacao_id'];

    public function aprovacao()
    {
        return $this->belongsTo(Aprovacao::class, 'aprovacao_id', 'id');
    }
}
