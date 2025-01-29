<?php

namespace App\Services\User;


use Illuminate\Database\Eloquent\Model;

interface UserServiceInterface
{
    public function getAuthUser($user_id): ?Model;


}
