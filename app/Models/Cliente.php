<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    // Setter para a senha
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

     // Acesso ao status
    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 1 ? "Ativo" : "Desativado";
    }

    // Relacionamento com EnderecoCobranca
    public function enderecoCobranca()
    {
        return $this->hasOne(EnderecoCobranca::class);
    }

    // Relacionamento com EnderecoEnvio
    public function enderecoEnvio()
    {
        return $this->hasOne(EnderecoEnvio::class);
    }
}
