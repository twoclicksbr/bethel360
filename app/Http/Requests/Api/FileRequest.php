<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'target_table' => 'required|string|max:100',
            'id_target' => 'required|integer',
            'name' => 'required|string|max:255',
            'path' => 'required|string|max:255',
            'type' => 'nullable|string|max:50',
            'size' => 'nullable|integer',
            'description' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'target_table.required' => 'A tabela de destino é obrigatória.',
            'id_target.required' => 'O ID do destino é obrigatório.',
            'name.required' => 'O nome do arquivo é obrigatório.',
            'path.required' => 'O caminho do arquivo é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
