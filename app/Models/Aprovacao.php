<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aprovacao extends Model
{
    protected $table = 'aprovacoes';

    protected $fillable = ['descricao', 'status', 'ideias_id'];

    // Retorna 'Sim' se o valor for 1, caso contrário retorna 'Não'
    public function getStatusAttribute($value): string
    {
        return $value === 1 ? 'Sim' : 'Não';
    }

    // Retorna a ideia associada à aprovação
    public function ideia(): BelongsTo
    {
        return $this->belongsTo(Ideia::class);
    }

    // Retorna as imagens associadas à aprovação
    public function images(): HasMany
    {
        return $this->hasMany(ImagemAprovacao::class, 'aprovacao_id', 'id');
    }
}
