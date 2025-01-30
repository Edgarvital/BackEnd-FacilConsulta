<?php

namespace App\Http\Controllers;

use App\Api\Responses;
use App\Services\Medico\MedicoServiceInterface;
use Illuminate\Http\Request;

class MedicoController extends Controller
{

    protected $medicoService;

    public function __construct(MedicoServiceInterface $medicoService)
    {
        $this->medicoService = $medicoService;
    }

    public function index(Request $request)
    {
        try {
            $medicos = $this->medicoService->getAll($request);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }

        return Responses::successResponse($medicos);
    }

    public function indexByCities($cidade_id, Request $request)
    {
        try {
            $medicos = $this->medicoService->getAllByCidade($cidade_id, $request);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }

        return Responses::successResponse($medicos);
    }

    public function store(\App\Http\Requests\Medico\StoreRequest $request)
    {
        try {
            $user = $this->medicoService->store($request);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }

        return Responses::successResponse($user, 201);
    }

    public function storeConsulta(\App\Http\Requests\Consulta\StoreRequest $request)
    {
        try {
            $user = $this->medicoService->storeConsulta($request);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }

        return Responses::successResponse($user, 201);
    }

}
