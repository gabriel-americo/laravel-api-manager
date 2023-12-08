<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlteracaoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'correcao' => 'required|min:3|max:250',
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
