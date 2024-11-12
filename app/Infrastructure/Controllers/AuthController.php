<?php declare(strict_types=1);

namespace App\Infrastructure\Controllers;

use App\Application\Services\Auth\Login\LogInWithCredentialsServiceInterface;
use App\Application\Services\Auth\Register\RegisterUserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private readonly LogInWithCredentialsServiceInterface $logInUserService,
        private readonly RegisterUserServiceInterface $registerUserService,
    ) {
        $this->middleware('auth:api', [
            'except' => ['login', 'register'],
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $response = $this->logInUserService->__invoke($credentials);

        return response()->json($response);
    }

    public function register(Request $request): JsonResponse
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

    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh(): JsonResponse
    {
        $user = Auth::user();

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ],
        ]);
    }
}
