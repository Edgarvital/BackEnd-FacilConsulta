<?php

namespace App\Http\Requests\Paciente;

use App\Api\Responses;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nome' => 'required|string|min:4|max:250',
            'cpf' => 'required|string|size:14|regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/|unique:pacientes,cpf',
            'celular' => 'required|string|regex:/^\(\d{2}\)\s9\s\d{4}-\d{4}$/',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O nome deve ter pelo menos 4 caracteres.',
            'nome.max' => 'O nome não pode ter mais de 250 caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.size' => 'O CPF deve ter exatamente 14 caracteres no formato XXX.XXX.XXX-XX.',
            'cpf.regex' => 'O CPF deve estar no formato correto: XXX.XXX.XXX-XX.',
            'cpf.unique' => 'O CPF informado já está cadastrado.',
            'celular.required' => 'O campo celular é obrigatório.',
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
