<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoEnvios extends Model
{
    use HasFactory;

    protected $table='endereco_envios';

    protected $fillable = ['nome_envios', 'sobrenome_envios', 'empresa_envios', 'rua_envios', 'numero_envios', 'complemento_envios', 'bairro_envios', 'cidade_envios', 'cep_envios', 'pais_envios', 'estado_envios', 'clientes_id'];

    public function clienteEnvio()
    {
        return $this->belongsTo(Clientes::class, 'clientes_id', 'id');
    }
}
