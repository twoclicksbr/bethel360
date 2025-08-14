<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MinistryLeaderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'id_ministry' => 'required|integer|exists:ministry,id',
            'id_person' => 'required|integer|exists:person,id',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'id_ministry.required' => 'O ministério é obrigatório.',
            'id_person.required' => 'A pessoa é obrigatória.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
