<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnderecoCobranca extends Model
{
    use HasFactory;

    protected $table = 'enderecos_cobrancas';

    protected $fillable = [
        'nome_cobrancas', 'sobrenome_cobrancas', 'cpf_cobrancas', 'cnpj_cobrancas', 'empresa_cobrancas', 'nascimento_cobrancas', 'sexo_cobrancas', 'rua_cobrancas', 'numero_cobrancas', 'complemento_cobrancas', 'bairro_cobrancas', 'cidade_cobrancas', 'cep_cobrancas', 'pais_cobrancas', 'estado_cobrancas', 'telefone_cobrancas', 'celular_cobrancas', 'email_cobrancas', 'cliente_id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
