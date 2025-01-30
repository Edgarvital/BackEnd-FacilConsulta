<?php

namespace App\Repositories\Eloquent;

use App\Models\Consulta;
use App\Repositories\ConsultaRepositoryInterface;

class ConsultaRepository extends BaseRepository implements ConsultaRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Consulta $model
     */
    public function __construct(Consulta $model)
    {
        parent::__construct($model);
    }

}
