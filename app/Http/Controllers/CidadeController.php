<?php

namespace App\Http\Controllers;

use App\Api\Responses;
use App\Services\Cidade\CidadeServiceInterface;
use Illuminate\Http\Request;

class CidadeController extends Controller
{

    protected $cidadeService;

    public function __construct(CidadeServiceInterface $cidadeService)
    {
        $this->cidadeService = $cidadeService;
    }

    public function index(Request $request)
    {
        try {
            $cidades = $this->cidadeService->getAllCidades($request);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }

        return Responses::successResponse($cidades);
    }

}
