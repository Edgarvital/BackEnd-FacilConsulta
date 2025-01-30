<?php

namespace App\Http\Requests\Medico;

use App\Api\Responses;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nome' => 'required|string|min:4|max:250',
            'especialidade' => [
                'required',
                'string',
                Rule::in(['Cardiologista', 'Pediatra', 'Ortopedista', 'Neurologista', 'Dermatologista']),
            ],
            'cidade_id' => 'required|integer|exists:cidades,id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O nome deve ter pelo menos 4 caracteres.',
            'especialidade.required' => 'A especialidade é obrigatória.',
            'especialidade.in' => 'A especialidade selecionada não é válida.',
            'cidade_id.required' => 'O campo cidade é obrigatório.',
            'cidade_id.exists' => 'A cidade selecionada não existe.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            Responses::errorResponseWithData('Validation errors', $validator->errors(), 422)
        );
    }
}
