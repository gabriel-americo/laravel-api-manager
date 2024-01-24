<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerguntaIdeia extends Model
{
    protected $table = 'perguntas_ideias';

    protected $fillable = ['pergunta', 'resposta', 'ideia_id', 'usuario_id'];

    public function ideia(): BelongsTo
    {
        return $this->belongsTo(Ideia::class, 'ideia_id', 'id');
    }
}
