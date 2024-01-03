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
        // Regras comuns para store
        $rules = [
            'nome'        => 'required|min:3',
            'user'        => 'required|min:3|unique:usuarios',
            'email'       => 'required|email|unique:usuarios',
            'password'    => 'required|min:6',
            'roles'       => 'required',
        ];

        // Adicionando condições para update
        /*if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules = [
                'nome'     => 'required|min:3',
                'roles'    => 'required',
                'user'     => 'required|min:3',
            ];
        }*/

        return $rules;
    }

    public function messages()
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
