<?php

namespace App\Services\Paciente;

use App\Http\Requests\Paciente\StoreRequest;
use App\Http\Requests\Paciente\UpdateRequest;
use App\Repositories\ConsultaRepositoryInterface;
use App\Repositories\PacienteRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PacienteService implements PacienteServiceInterface
{

    protected ConsultaRepositoryInterface $consultaRepository;
    protected PacienteRepositoryInterface $pacienteRepository;

    public function __construct(
        PacienteRepositoryInterface $pacienteRepository,
        ConsultaRepositoryInterface $consultaRepository,
    )
    {
        $this->pacienteRepository = $pacienteRepository;
        $this->consultaRepository = $consultaRepository;
    }

    public function store(StoreRequest $request): ?Model
    {
        $attributes = $request->all();

        try {
            return $this->pacienteRepository->create($attributes);
        } catch (\Exception $e) {
            throw new \Exception('Erro ao cadastrar paciente no banco de dados.', $e->getCode());
        }
    }

    public function update($paciente_id, UpdateRequest $request): ?Model
    {
        try {
            $this->pacienteRepository->findOrFail($paciente_id);
        } catch (\Exception) {
            throw new \Exception('Usuário não encontrado', 404);
        }

        $attributes = $request->all();

        try {
            return $this->pacienteRepository->update($paciente_id, $attributes);
        } catch (\Exception $e) {
            throw new \Exception('Erro ao cadastrar paciente no banco de dados.', $e->getCode());
        }
    }

    public function getAllByMedico($medico_id, $request): ?Collection
    {
        try {
            return $this->pacienteRepository->listByFilters($medico_id, $request);
        } catch (\Exception $e) {
            throw new \Exception('Erro ao listar pacientes e consultas no banco de dados.', $e->getCode());
        }

    }



}
