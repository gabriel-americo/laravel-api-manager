<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nome', 'descricao'];

    // Definindo o relacionamento muitos-para-muitos com o modelo Usuario
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class);
    }
}
