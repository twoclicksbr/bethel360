<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ThemeGroupAttendanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'nullable|integer|exists:credential,id',
            'id_theme_group_lesson' => 'required|integer|exists:theme_group_lesson,id',
            'id_person' => 'required|integer|exists:person,id',
            'present' => 'required|boolean',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_theme_group_lesson.required' => 'A aula é obrigatória.',
            'id_person.required' => 'A pessoa é obrigatória.',
            'present.required' => 'Informe se a pessoa esteve presente.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
