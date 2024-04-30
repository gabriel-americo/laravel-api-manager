<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IdeiaPergunta extends Model
{
    use HasFactory;

    protected $table = 'ideias_perguntas';

    protected $fillable = ['pergunta', 'resposta', 'ideia_id', 'usuario_id'];

    public function ideia(): BelongsTo
    {
        return $this->belongsTo(Ideia::class, 'ideia_id', 'id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
}
