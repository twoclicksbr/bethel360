<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PersonAvatarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:3072',
        ];
    }

    public function messages(): array
    {
        return [
            'avatar.required' => 'Selecione uma imagem para o avatar.',
            'avatar.image'    => 'O arquivo deve ser uma imagem válida.',
            'avatar.mimes'    => 'A imagem deve estar no formato jpeg, jpg ou png.',
            'avatar.max'      => 'A imagem não pode ter mais de 3MB.',
        ];
    }
}
