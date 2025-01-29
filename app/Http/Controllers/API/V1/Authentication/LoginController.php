<?php

namespace App\Http\Controllers\API\V1\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }
    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->authService->login($validatedData);
        if(isset($user['status'])) {
            return response()->json([
                        $user,
                        'message' => 'Incorrect email and password'
                    ], 401);
        }

        return response()->json([
            'data' => $user,
            'message' => 'User logged in successfully'
        ], Response::HTTP_OK);

    }

    public function user(string $id) {
        return response()->json([
            'data' => User::where('id', $id)->first(),
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        $this->authService->logout();
        return response()->json([
            'message' => 'User logged out successfully'
        ], Response::HTTP_OK);
    }
}
