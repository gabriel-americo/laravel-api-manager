<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'min:3'],
            'password' => ['required', 'min:6'],
            'email'    => ['required', 'email', 'max:255', 'unique:users'],
            'user'     => ['required', 'unique:users'],
            'sex'      => ['required'],
            'roles'    => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'required'      =>  'O campo :attribute é obrigatório!',
            'name.string'   =>  'O nome deve ser uma string!',
            'name.min'      =>  'O nome precisa ter no mínimo 3 caracteres.',
            'password.min'  =>  'A senha precisa ter no mínimo 6 caracteres.',
            'email.email'   =>  'Formato de e-mail inválido!',
            'email.max'     =>  'O e-mail precisa ter no máximo 255 caracteres.',
            'email.unique'  =>  'Um usuário com este e-mail já existe.',
            'user.unique'   =>  'Um usuário com este nome de usuário já existe.',
            'sex.required'  =>  'O campo sexo é obrigatório!',
        ];
    }
}