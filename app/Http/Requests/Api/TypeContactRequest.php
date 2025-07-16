<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TypeContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'name' => 'required|string|max:100',
            'mask' => 'nullable|string|max:50',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'id_credential.integer' => 'A credencial deve ser um número válido.',
            'id_credential.exists' => 'A credencial informada não existe.',
            'name.required' => 'O nome do tipo de contato é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais que 100 caracteres.',
            'mask.max' => 'A máscara não pode ter mais que 50 caracteres.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
