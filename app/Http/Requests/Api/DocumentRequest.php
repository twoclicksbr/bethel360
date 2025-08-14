<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocumentRequest extends FormRequest
{
    public function rules(): array
    {
        $id = (int)($this->route('id') ?? 0);
        $idCredential = (int)$this->input('id_credential');

        return [
            // 'id_credential'      => ['required', 'integer', 'exists:credential,id'],
            'target_table'       => ['required', 'string', 'max:100'],
            'id_target'          => ['required', 'integer'],
            'id_type_document'   => ['required', 'integer', 'exists:type_document,id'],
            'value'              => [
                'required',
                'string',
                'max:100',
                // unique por credencial considerando deleted = 0; ignora o próprio id no update
                Rule::unique('document', 'value')
                    ->where(fn($q) => $q->where('id_credential', $idCredential)->where('deleted', 0))
                    ->ignore($id)
            ],
            'active'             => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required'    => 'A credencial é obrigatória.',
            'target_table.required'     => 'A tabela de destino é obrigatória.',
            'id_target.required'        => 'O ID do destino é obrigatório.',
            'id_type_document.required' => 'O tipo de documento é obrigatório.',
            'value.required'            => 'O valor do documento é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
