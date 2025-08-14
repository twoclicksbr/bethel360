<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MinistryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'id_theme_ministry' => 'nullable|integer|exists:theme_ministry,id',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'name.required' => 'O nome do ministério é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
