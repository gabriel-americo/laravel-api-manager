<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'O campo de :attribute é obrigatório.',
        ];
    }
}
