<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ThemeCelebrationOccurrenceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'id_theme_celebration' => 'required|integer|exists:theme_celebration,id',
            'starts_at' => 'required|date',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'id_theme_celebration.required' => 'A celebração base é obrigatória.',
            'starts_at.required' => 'A data e hora de início são obrigatórias.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
