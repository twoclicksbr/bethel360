<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ThemeMinistryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'nullable|integer|exists:credential,id',
            'name' => 'required|string|max:100|unique:theme_ministry,name',
            'label' => 'required|string|max:100',
            'description' => 'nullable|string',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome técnico do tema é obrigatório.',
            'label.required' => 'O nome visível do tema é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
