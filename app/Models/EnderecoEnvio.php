<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnderecoEnvio extends Model
{
    use HasFactory;

    protected $table = 'enderecos_envios';

    protected $fillable = [
        'nome_envios', 'sobrenome_envios', 'empresa_envios', 'rua_envios', 'numero_envios', 'complemento_envios', 'bairro_envios', 'cidade_envios', 'cep_envios', 'pais_envios', 'estado_envios', 'cliente_id'
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
