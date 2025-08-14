<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ThemeCelebrationMinistryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'id_theme_celebration_occurrence' => 'required|integer|exists:theme_celebration_occurrence,id',
            'id_ministry' => 'required|integer|exists:ministry,id',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'id_theme_celebration_occurrence.required' => 'A ocorrência da celebração é obrigatória.',
            'id_ministry.required' => 'O ministério é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
