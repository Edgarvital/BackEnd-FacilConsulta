<?php

namespace App\Repositories\Eloquent;

use App\Models\Cidade;
use App\Repositories\CidadeRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CidadeRepository extends BaseRepository implements CidadeRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Cidade $model
     */
    public function __construct(Cidade $model)
    {
        parent::__construct($model);
    }
    public function listByFilters($request): ?Collection
    {
        $query = $this->model->newQuery();

        if ($request->has('nome')) {
            $searchValue = strtolower($request->input('nome'));

            $query->where(DB::raw('lower(nome)'), 'like', "%{$searchValue}%");
        }

        $query->orderBy('nome', 'ASC');

        return $query->get();
    }


}
