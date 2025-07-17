<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TypeGroupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'nullable|integer|exists:credential,id',
            'name' => 'required|string|max:100|unique:type_group,name',
            'mask' => 'nullable|string|max:50',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do tipo de grupo é obrigatório.',
            'name.unique' => 'Já existe um tipo de grupo com esse nome.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
