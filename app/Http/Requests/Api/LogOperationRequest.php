<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class LogOperationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'module' => 'required|string|max:100',
            'action' => 'required|string|max:50',
            'details' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'module.required' => 'O módulo é obrigatório.',
            'action.required' => 'A ação é obrigatória.',
        ];
    }
}
