<?php

namespace App\Http\Controllers;

use App\Api\Responses;
use App\Http\Requests\Paciente\StoreRequest;
use App\Http\Requests\Paciente\UpdateRequest;
use App\Services\Paciente\PacienteServiceInterface;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    protected $pacienteService;

    public function __construct(PacienteServiceInterface $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }

    public function index($medico_id, Request $request)
    {
        try {
            $user = $this->pacienteService->getAllByMedico($medico_id, $request);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }

        return Responses::successResponse($user);
    }

    public function store(StoreRequest $request)
    {
        try {
            $user = $this->pacienteService->store($request);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }

        return Responses::successResponse($user, 201);
    }

    public function update($paciente_id, UpdateRequest $request)
    {
        try {
            $user = $this->pacienteService->update($paciente_id, $request);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }

        return Responses::successResponse($user);
    }

}
