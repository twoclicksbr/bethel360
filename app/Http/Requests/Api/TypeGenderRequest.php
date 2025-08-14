<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TypeGenderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_credential' => 'required|exists:credential,id',
            'name'          => 'required|string|max:50',
            'active'        => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'O campo credencial é obrigatório.',
            'id_credential.exists'   => 'A credencial informada é inválida.',
            'name.required'          => 'O campo nome é obrigatório.',
            'name.max'               => 'O nome deve ter no máximo 50 caracteres.',
            'active.required'        => 'O campo ativo é obrigatório.',
        ];
    }
}
