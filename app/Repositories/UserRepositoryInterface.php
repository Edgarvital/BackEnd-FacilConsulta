<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getAuthUserInfos($user_id): ?Model;

}
