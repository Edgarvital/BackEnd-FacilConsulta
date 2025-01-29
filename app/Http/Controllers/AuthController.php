<?php

namespace App\Http\Controllers;

use App\Api\Responses;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return Responses::errorResponseWithData("Not Authorized", 'Verifique suas credenciais', 403);
        }

        return Responses::successResponse([
            'token' => $token,
        ]);
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }

        return Responses::successResponse('Token Revoked');
    }

    public function user()
    {
        $user = JWTAuth::user();

        try {
            $userData = $this->userService->getAuthUser($user->id);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }

        return Responses::successResponse($userData);
    }
}
