<?php

namespace App\Http\Requests\Consulta;

use App\Api\Responses;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'data' => 'required|date_format:Y-m-d H:i:s|after:today',
            'medico_id' => 'required|integer|exists:medicos,id',
            'paciente_id' => 'required|integer|exists:pacientes,id',
        ];
    }

    public function messages()
    {
        return [
            'data.required' => 'O campo data é obrigatório.',
            'data.date_format' => 'A data deve estar no formato Y-m-d H:i:s.',
            'data.after' => 'A data deve ser posterior ao dia de hoje.',
            'medico_id.required' => 'O campo médico é obrigatório.',
            'medico_id.integer' => 'O campo médico deve ser um número inteiro.',
            'medico_id.exists' => 'O médico selecionado não existe.',
            'paciente_id.required' => 'O campo paciente é obrigatório.',
            'paciente_id.integer' => 'O campo paciente deve ser um número inteiro.',
            'paciente_id.exists' => 'O paciente selecionado não existe.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            Responses::errorResponseWithData('Validation errors', $validator->errors(), 422)
        );
    }
}
