<?php

namespace App\Infrastructure\Controllers\Auth;

use App\Application\Services\Auth\Register\RegisterUserServiceInterface;
use App\Infrastructure\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(
        private readonly RegisterUserServiceInterface $registerUserService,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $response = $this->registerUserService->__invoke(
            email: $request->get('email'),
            password: $request->get('password'),
        );

        return response()->json($response);
    }
}