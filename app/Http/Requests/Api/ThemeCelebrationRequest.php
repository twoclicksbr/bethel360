<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ThemeCelebrationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_credential' => 'required|integer|exists:credential,id',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'weekday' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'id_credential.required' => 'A credencial é obrigatória.',
            'name.required' => 'O nome da celebração é obrigatório.',
            'weekday.required' => 'O dia da semana é obrigatório.',
            'start_time.required' => 'O horário de início é obrigatório.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
