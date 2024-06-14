<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'   => ['required', 'string', 'min:3'],
            'sexo'   => ['required'],
            'status' => ['required'],
        ];
    }

    public function messages() : array
    {
        return [
            'required'  => 'Este campo :attribute é obrigatório!',
            'min'       => 'Precisa ter no minimo :min caracteres',
            'max'       => 'Precisa ter no maximo :max caracteres',
            'unique'    => 'Um usuário com este :attribute já existe.',
            'email'     => 'Formato de E-mail invalido!'
        ];
    }
}