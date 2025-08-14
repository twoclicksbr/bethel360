<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ThemeGroupMaterialRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'nullable|integer|exists:credential,id',
            'id_theme_group' => 'required|integer|exists:theme_group,id',
            'title' => 'required|string|max:100',
            'id_file' => 'required|integer|exists:file,id',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_theme_group.required' => 'O grupo é obrigatório.',
            'title.required' => 'O título do material é obrigatório.',
            'id_file.required' => 'O arquivo é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
