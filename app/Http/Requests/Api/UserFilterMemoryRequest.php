<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserFilterMemoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_credential' => 'required|exists:credential,id',
            'id_person'     => 'required|exists:person,id',
            'route'         => 'required|string|max:255',
            'full_url'      => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'Informe a credencial.',
            'id_credential.exists'   => 'Credencial inválida.',
            'id_person.required'     => 'Informe a pessoa.',
            'id_person.exists'       => 'Pessoa inválida.',
            'route.required'         => 'Informe a rota.',
        ];
    }
}
