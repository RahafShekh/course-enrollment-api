<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

  
public function register(RegisterRequest $request): JsonResponse
{
    $result = $this->authService->register($request->validated());

    return response()->json([
        'message' => 'User registered successfully',
        'user' => $result['user'],
        'token' => $result['token']
    ], 201);
}

   
    public function login(LoginRequest $request): JsonResponse
    {
        $token = $this->authService->login($request->validated());

        if (!$token) {
            return response()->json([
                'message' => 'Invalid credentials',
                'success' => false
            ], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'success' => true,
            'token' => $token
        ], 200);
    }

   
    public function logout(): JsonResponse
    {
        try {
            $this->authService->logout();

            return response()->json([
                'message' => 'Logout successful',
                'success' => true
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to logout, please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
