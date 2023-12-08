<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TamanhosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tamanho' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo :attribute é obrigatório!',
        ];
    }
}
