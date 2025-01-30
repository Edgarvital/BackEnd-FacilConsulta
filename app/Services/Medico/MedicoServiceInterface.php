<?php

namespace App\Services\Medico;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface MedicoServiceInterface
{
    public function getAll($request): ?Collection;
    public function getAllByCidade($cidade_id, $request): ?Collection;
    public function store(\App\Http\Requests\Medico\StoreRequest $request): ?Model;
    public function storeConsulta(\App\Http\Requests\Consulta\StoreRequest $request): ?Model;
}
