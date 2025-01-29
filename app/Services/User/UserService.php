<?php

namespace App\Services\User;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserService implements UserServiceInterface
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
    )
    {
        $this->userRepository = $userRepository;
    }

    public function getAuthUser($user_id): ?Model
    {
        $user = $this->userRepository->getAuthUserInfos($user_id);
        if (!$user)
            throw new \Exception('User not found or not authenticated', 404);

        return $user;
    }

}
