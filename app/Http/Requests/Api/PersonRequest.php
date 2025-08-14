<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // 'id_credential' => 'required|exists:credential,id',
            'id_gender'     => 'required|nullable|exists:type_gender,id',
            'name'          => 'required|string|max:255',
            'birthdate'     => 'required|nullable|date',
            'active'        => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'O campo credencial é obrigatório.',
            'id_credential.exists'   => 'A credencial informada é inválida.',
            'id_gender.exists'       => 'O gênero selecionado é inválido.',
            'id_gender.required'     => 'O campo gênero é obrigatório.',
            'name.required'          => 'O campo nome é obrigatório.',
            'name.string'            => 'O campo nome deve ser um texto.',
            'name.max'               => 'O campo nome deve ter no máximo 255 caracteres.',
            'birthdate.required'     => 'O campo data de nascimento é obrigatório.',
            'birthdate.date'         => 'Informe uma data de nascimento válida.',
            'active.required'        => 'O campo ativo é obrigatório.',
            'active.boolean'         => 'O campo ativo deve ser verdadeiro ou falso.',
        ];
    }
}
