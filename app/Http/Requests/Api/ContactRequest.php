<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'target_table' => 'required|string|max:100',
            'id_target' => 'required|integer',
            'id_type_contact' => 'required|integer|exists:type_contact,id',
            'value' => 'required|string|max:100',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'target_table.required' => 'A tabela de destino é obrigatória.',
            'id_target.required' => 'O ID do destino é obrigatório.',
            'id_type_contact.required' => 'O tipo de contato é obrigatório.',
            'value.required' => 'O valor do contato é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
