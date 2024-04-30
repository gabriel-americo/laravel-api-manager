<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'nome', 'user', 'email', 'sexo', 'imagem', 'ultimo_login', 'password', 'tipo', 'status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'ultimo_login' => 'datetime',
    ];

    // Definindo o relacionamento muitos-para-muitos com o modelo Role
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_usuario', 'usuario_id', 'role_id');
    }

    public function ideiaPergunta() : HasMany
    {
        return $this->hasMany(IdeiaPergunta::class, 'usuario_id', 'id');
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
