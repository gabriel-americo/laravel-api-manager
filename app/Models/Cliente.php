<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Authenticatable
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = ['nome', 'sobrenome', 'user', 'email', 'site', 'imagem', 'password', 'status'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getStatusAttribute()
    {
      return $this->attributes['status'] == 1 ? "Ativo" : "Desativado";
    }

    public function enderecoCobranca()
    {
        return $this->hasOne(EnderecoCobrancas::class, 'clientes_id', 'id');
    }

    public function enderecoEnvio()
    {
        return $this->hasOne(EnderecoEnvios::class, 'clientes_id', 'id');
    }
}
