<?php

namespace App\Services\Cidade;

use Illuminate\Support\Collection;

interface CidadeServiceInterface
{
    public function getAllCidades($request): ?Collection;

}
