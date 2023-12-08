<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AprovacoesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ideias_id' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo :attribute é obrigatório!'
        ];
    }
}
