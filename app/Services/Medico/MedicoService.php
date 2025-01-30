<?php

namespace App\Services\Medico;

use App\Repositories\CidadeRepositoryInterface;
use App\Repositories\ConsultaRepositoryInterface;
use App\Repositories\MedicoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MedicoService implements MedicoServiceInterface
{
    protected MedicoRepositoryInterface $medicoRepository;
    protected CidadeRepositoryInterface $cidadeRepository;
    protected ConsultaRepositoryInterface $consultaRepository;

    public function __construct(
        MedicoRepositoryInterface $medicoRepository,
        CidadeRepositoryInterface $cidadeRepository,
        ConsultaRepositoryInterface $consultaRepository,
    )
    {
        $this->medicoRepository = $medicoRepository;
        $this->cidadeRepository = $cidadeRepository;
        $this->consultaRepository = $consultaRepository;
    }

    public function getAll($request): ?Collection
    {
        try {
            return $this->medicoRepository->listByFilters($request);
        } catch (\Exception $e) {
            throw new \Exception('Erro ao consultar o banco de dados.', $e->getCode());
        }
    }

    public function store($request): ?Model
    {
        $attributes = $request->all();

        try {
            return $this->medicoRepository->create($attributes);
        } catch (\Exception $e) {
            throw new \Exception('Erro ao cadastrar médico no banco de dados.', $e->getCode());
        }
    }

    public function getAllByCidade($cidade_id, $request): ?Collection
    {
        try {
            $cidade = $this->cidadeRepository->findOrFail($cidade_id);
            if (!$cidade) {
                throw new \Exception('Cidade não encontrada.', 404);
            }
            return $this->medicoRepository->listByFiltersAndCity($cidade_id, $request);
        } catch (\Exception $e) {
            throw new \Exception('Erro ao consultar o banco de dados.', $e->getCode());
        }
    }

    public function storeConsulta(\App\Http\Requests\Consulta\StoreRequest $request): ?Model
    {
        $attributes = $request->all();

        try {
            return $this->consultaRepository->create($attributes);
        } catch (\Exception $e) {
            throw new \Exception('Erro ao cadastrar consulta no banco de dados.', $e->getCode());
        }

    }
}
