<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|min:3',
            'preco' => 'required',
            'qtd' => 'required',
            'fornecedores_id' => 'required',
            'tipo_subcategoria_custos_id' => 'required',
            'tipo_custos_id' => 'required'
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
