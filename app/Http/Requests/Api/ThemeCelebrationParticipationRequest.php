<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ThemeCelebrationParticipationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'id_theme_celebration_occurrence' => 'required|integer|exists:theme_celebration_occurrence,id',
            'id_ministry' => 'required|integer|exists:ministry,id',
            'id_person' => 'required|integer|exists:person,id',
            'role' => 'nullable|string|max:100',
            'entry_at' => 'nullable|date_format:H:i',
            'exit_at' => 'nullable|date_format:H:i',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'id_theme_celebration_occurrence.required' => 'A ocorrência da celebração é obrigatória.',
            'id_ministry.required' => 'O ministério é obrigatório.',
            'id_person.required' => 'A pessoa é obrigatória.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
