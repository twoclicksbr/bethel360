<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ThemeGroupPersonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'nullable|integer|exists:credential,id',
            'id_theme_group' => 'required|integer|exists:theme_group,id',
            'id_person' => 'required|integer|exists:person,id',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_theme_group.required' => 'O grupo é obrigatório.',
            'id_person.required' => 'A pessoa é obrigatória.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
