<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ThemeGroupLessonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'nullable|integer|exists:credential,id',
            'id_theme_group' => 'required|integer|exists:theme_group,id',
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_theme_group.required' => 'O grupo é obrigatório.',
            'title.required' => 'O título da aula é obrigatório.',
            'date.required' => 'A data da aula é obrigatória.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
