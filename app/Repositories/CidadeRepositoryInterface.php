<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface CidadeRepositoryInterface
{
    public function listByFilters($request): ?Collection;

}
