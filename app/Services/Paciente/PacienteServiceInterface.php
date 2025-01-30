<?php

namespace App\Services\Paciente;

use App\Http\Requests\Paciente\StoreRequest;
use App\Http\Requests\Paciente\UpdateRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PacienteServiceInterface
{

    public function getAllByMedico($medico_id, $request): ?Collection;
    public function store(StoreRequest $request): ?Model;
    public function update($paciente_id, UpdateRequest $request): ?Model;

}
