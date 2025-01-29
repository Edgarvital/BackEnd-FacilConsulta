<?php

namespace App\Services\Cidade;

use App\Repositories\CidadeRepositoryInterface;
use Illuminate\Support\Collection;

class CidadeService implements CidadeServiceInterface
{
    protected CidadeRepositoryInterface $cidadeRepository;

    public function __construct(
        CidadeRepositoryInterface $cidadeRepository,
    )
    {
        $this->cidadeRepository = $cidadeRepository;
    }


    /**
     * @throws \Exception
     */
    public function getAllCidades($request): ?Collection
    {
        try {
            return $this->cidadeRepository->listByFilters($request);
        } catch (\Exception $e) {
            throw new \Exception('Erro ao consultar o banco de dados.', $e->getCode());
        }
    }
}
