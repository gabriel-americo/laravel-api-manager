<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Hash;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name', 'last_name', 'user', 'email', 'site', 'email_verified_at', 'image',	'status'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relacionamento com EnderecoCobranca
    public function addresses(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    // Relacionamento com EnderecoEnvio
    public function shippings(): HasOne
    {
        return $this->hasOne(Shipping::class);
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
