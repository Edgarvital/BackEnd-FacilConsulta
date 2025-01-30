<?php

namespace App\Repositories\Eloquent;

use App\Models\Medico;
use App\Repositories\MedicoRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MedicoRepository extends BaseRepository implements MedicoRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Medico $model
     */
    public function __construct(Medico $model)
    {
        parent::__construct($model);
    }
    public function listByFilters($request): ?Collection
    {
        $query = $this->model->newQuery();

        if ($request->filled('nome')) {
            $searchValue = strtolower($request->input('nome'));

            $searchValue = preg_replace('/\b(dr|dra)\.?\s*/i', '', $searchValue);

            $query->whereRaw('LOWER(nome) LIKE ?', ["%{$searchValue}%"]);
        }

        $query->orderBy('nome', 'ASC');

        return $query->get();
    }

    public function listByFiltersAndCity($cidade_id, $request): ?Collection
    {
        $query = $this->model->newQuery();

        if ($request->filled('nome')) {
            $searchValue = strtolower($request->input('nome'));

            $searchValue = preg_replace('/\b(dr|dra)\.?\s*/i', '', $searchValue);

            $query->whereRaw('LOWER(nome) LIKE ?', ["%{$searchValue}%"]);
        }

        $query->where('cidade_id', $cidade_id);

        return $query->orderBy('nome', 'ASC')->get();
    }
}
