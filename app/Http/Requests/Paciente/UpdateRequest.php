<?php

namespace App\Http\Requests\Paciente;

use App\Api\Responses;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRequest extends FormRequest
{
    public function rules()
    {

        return [
            'nome' => 'sometimes|string|min:4|max:250',
            'celular' => 'sometimes|string|regex:/^\(\d{2}\)\s9\s\d{4}-\d{4}$/',
        ];
    }

    public function messages()
    {
        return [
            'nome.min' => 'O nome deve ter pelo menos 4 caracteres.',
            'nome.max' => 'O nome não pode ter mais de 250 caracteres.',
            'celular.regex' => 'O celular deve estar no formato correto: (XX) 9 XXXX-XXXX.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            Responses::errorResponseWithData('Validation errors', $validator->errors(), 422)
        );
    }
}
