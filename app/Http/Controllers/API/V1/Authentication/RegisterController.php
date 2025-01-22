<?php

namespace App\Http\Controllers\API\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class RegisterController extends Controller
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function register(RegistrationRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->authService->register($validatedData);
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'access_token' => $token,
            'data' => $user,
            'message' => 'User registered successfully'
        ], Response::HTTP_CREATED);

    }
}
