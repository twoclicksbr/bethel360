<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'target_table' => 'required|string|max:100',
            'id_target' => 'required|integer',
            'id_type_address' => 'required|integer|exists:type_address,id',
            'zipcode' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:100',
            'number' => 'nullable|string|max:20',
            'complement' => 'nullable|string|max:50',
            'neighborhood' => 'nullable|string|max:50',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'main' => 'nullable|boolean',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'target_table.required' => 'A tabela de destino é obrigatória.',
            'id_target.required' => 'O ID do destino é obrigatório.',
            'id_type_address.required' => 'O tipo de endereço é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
