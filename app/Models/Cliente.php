<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Hash;

class Cliente extends Authenticatable
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome', 'sobrenome', 'user', 'email', 'site', 'imagem', 'password', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    // Relacionamento com EnderecoCobranca
    public function enderecoCobranca(): HasOne
    {
        return $this->hasOne(EnderecoCobranca::class);
    }

    // Relacionamento com EnderecoEnvio
    public function enderecoEnvio(): HasOne
    {
        return $this->hasOne(EnderecoEnvio::class);
    }

    // Criptografa a senha antes de atribuí-la ao modelo
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    // Acessor para o atributo 'status', retorna 'Ativo' se for 1, senão 'Desativado'
    public function getStatusAttribute($value)
    {
        return $value === 1 ? 'Ativo' : 'Desativado';
    }
}
