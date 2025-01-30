<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface MedicoRepositoryInterface
{
    public function listByFilters($request): ?Collection;
    public function listByFiltersAndCity($cidade_id, $request): ?Collection;
}
