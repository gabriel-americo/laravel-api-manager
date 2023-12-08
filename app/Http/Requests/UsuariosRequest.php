<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'        => 'required|min:3',
            'user'        => 'required|min:3|unique:usuarios',
            'email'       => 'required|email|unique:usuarios',
            'password'    => 'required|min:6',
            'roles'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo :attribute é obrigatório!',
            'min' => 'Precisa ter no minimo :min caracteres',
            'max' => 'Precisa ter no maximo :max caracteres',
            'unique' => 'Um usuário com este :attribute já existe.',
            'email' => 'Formato de E-mail invalido!'
        ];
    }
}
