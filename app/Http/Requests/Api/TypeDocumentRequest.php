<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TypeDocumentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'name' => 'required|string|max:100',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'name.required' => 'O nome do tipo de documento é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
