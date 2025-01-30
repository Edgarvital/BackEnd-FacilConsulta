<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface PacienteRepositoryInterface
{

    public function listByFilters($medico_id, $request): ?Collection;

}
