<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeiasRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:80',
            'criador' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo :attribute é obrigatório!',
            'min' => 'Precisa ter no minimo :min caracteres',
            'max' => 'Precisa ter no maximo :max caracteres'
        ];
    }
}
