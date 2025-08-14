<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ThemeGroupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'nullable|integer|exists:credential,id',
            'id_type_group' => 'required|integer|exists:type_group,id',
            'name' => 'required|string|max:100|unique:theme_group,name',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'id_person_leader' => 'nullable|integer|exists:person,id',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_type_group.required' => 'O tipo de grupo é obrigatório.',
            'name.required' => 'O nome do grupo é obrigatório.',
            'name.unique' => 'Já existe um grupo com esse nome.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
