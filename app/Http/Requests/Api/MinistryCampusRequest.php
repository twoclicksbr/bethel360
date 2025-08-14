<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MinistryCampusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_ministry' => 'required|integer|exists:ministry,id',
            'id_campus' => 'required|integer|exists:campus,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id_ministry.required' => 'O ministério é obrigatório.',
            'id_campus.required' => 'O campus é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
