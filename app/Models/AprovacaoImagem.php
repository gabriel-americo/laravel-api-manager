<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AprovacaoImagem extends Model
{
    protected $table = 'aprovacoes_imagens';

    protected $fillable = ['imagem', 'aprovacao_id'];

    public function aprovacao(): BelongsTo
    {
        return $this->belongsTo(Aprovacao::class, 'aprovacao_id', 'id');
    }
}
