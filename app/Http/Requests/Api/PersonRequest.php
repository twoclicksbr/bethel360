<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'birthdate' => 'nullable|date',
            'active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser um texto.',
            'birthdate.date' => 'Informe uma data de nascimento válida.',
            'active.boolean' => 'O campo ativo deve ser verdadeiro ou falso.',
        ];
    }
}
