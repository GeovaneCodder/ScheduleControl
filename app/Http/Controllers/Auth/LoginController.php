<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\{Controllers\Controller, Requests\Auth\LoginRequest};
use App\Facades\{ValidateLogin, GenerateUserToken};
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Validate a user and return a json response with a
     * Bearer token
     * 
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)
            ->first();

        (new ValidateLogin($user, $request->password))
            ->check();

        $user->token = (new GenerateUserToken($user))->run();

        return response()->json([
            'success' => true,
            'data' => $user,
        ], Response::HTTP_OK);
    }
}