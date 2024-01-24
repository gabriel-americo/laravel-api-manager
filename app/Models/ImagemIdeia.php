<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImagemIdeia extends Model
{
    protected $table = 'imagens_ideias';

    protected $fillable = ['legenda', 'imagem', 'ideia_id'];

    public function ideia(): BelongsTo
    {
        return $this->belongsTo(Ideia::class);
    }
}
