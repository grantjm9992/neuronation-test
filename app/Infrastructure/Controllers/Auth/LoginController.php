<?php

namespace App\Infrastructure\Controllers\Auth;

use App\Application\Services\Auth\Login\LogInWithCredentialsServiceInterface;
use App\Infrastructure\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(
        private readonly LogInWithCredentialsServiceInterface $logInUserService,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $response = $this->logInUserService->__invoke($credentials);

        return response()->json($response);
    }
}