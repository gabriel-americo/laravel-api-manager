<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImagemAprovacao extends Model
{
    protected $table = 'imagens_aprovacoes';

    protected $fillable = ['imagem', 'aprovacao_id'];

    public function aprovacao(): BelongsTo
    {
        return $this->belongsTo(Aprovacao::class, 'aprovacao_id', 'id');
    }
}
