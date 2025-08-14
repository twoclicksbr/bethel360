<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'target_table' => 'required|string|max:100',
            'id_target' => 'required|integer',
            'note' => 'required|string',
            'created_by' => 'nullable|integer',
            'visible_to_user' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'target_table.required' => 'A tabela de destino é obrigatória.',
            'id_target.required' => 'O ID do destino é obrigatório.',
            'note.required' => 'O campo de observação é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
