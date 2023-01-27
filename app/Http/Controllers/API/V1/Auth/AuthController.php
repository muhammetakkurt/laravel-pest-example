<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function postLogin(LoginRequest $request, AuthService $authService): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $authService->login($request),
        ]);
    }
}
