<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IdeiaImagem extends Model
{
    use HasFactory;

    protected $table = 'ideias_imagens';

    protected $fillable = ['legenda', 'imagem', 'ideia_id'];

    public function ideia(): BelongsTo
    {
        return $this->belongsTo(Ideia::class);
    }
}
