<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:80'
        ];
    }

    public function message()
    {
        return [
            'required' => 'Este campo :attribute é obrigatório!',
            'min' => 'Precisa ter no minimo :min caracteres',
            'max' => 'Precisa ter no maximo :max caracteres'
        ];
    }
}
