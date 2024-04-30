<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resposta extends Model
{
    protected $fillable = ['resposta', 'data', 'alteracao_id', 'usuario_id'];

    protected $dates = ['data'];

    public function getDataBrAttribute()
    {
        return $this->attributes['data'] != NULL ? date('d/m/Y', strtotime($this->attributes['data'])) : "-";
    }

    public function alteracao(): BelongsTo
    {
        return $this->belongsTo(Alteracao::class, 'alteracao_id', 'id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
}
