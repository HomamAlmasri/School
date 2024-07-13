<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function login(loginRequest $request){
        $validated = $request->validated();

        $token = $this->authService->login($validated);

        if ($token) {
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function register(RegisterRequest $request){
        $validated = $request->validated();
        $token = $this->authService->register($validated);
        return response()->json(['token'=>$token],201);
    }
}
