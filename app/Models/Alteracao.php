<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alteracao extends Model
{
    protected $table = 'alteracoes';

    protected $fillable = ['correcao', 'status', 'aprovacao_id', 'usuario_id'];

    // Retorna a data no formato 'd/m/Y' se existir, caso contrário retorna "-"
    public function getDataBrAttribute(): string
    {
        return $this->data ? $this->data->format('d/m/Y') : "-";
    }

    // Retorna a aprovação associada à alteração
    public function aprovacao(): BelongsTo
    {
        return $this->belongsTo(Aprovacao::class, 'aprovacao_id', 'id');
    }

    // Retorna o usuário associado à alteração
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
}
