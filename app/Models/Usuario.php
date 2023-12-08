<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

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
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_usuarios', 'usuarios_id', 'roles_id');
    }

    // Verifica se o usuário possui uma role específica
    public function hasRole($role)
    {
        return $this->roles()->where('nome', $role)->exists();
    }

    // Criptografa a senha antes de atribuí-la ao modelo
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // Acessor para o atributo 'status', retorna 'Ativo' se for 1, senão 'Desativado'
    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 1 ? 'Ativo' : 'Desativado';
    }
}
