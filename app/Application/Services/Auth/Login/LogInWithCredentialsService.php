<?php

namespace App\Application\Services\Auth\Login;

use App\Application\ViewFactory\Auth\Login\UserLoggedInViewFactory;
use App\Domain\View\Auth\UserLoggedInView;
use App\Infrastructure\Exception\Auth\InvalidCredentialsException;
use Illuminate\Support\Facades\Auth;

class LogInWithCredentialsService implements LogInWithCredentialsServiceInterface
{
    public function __invoke(array $credentials): UserLoggedInView
    {
        $token = Auth::attempt($credentials);
        if (!$token) {
            throw new InvalidCredentialsException();
        }

        $user = Auth::user();

        return UserLoggedInViewFactory::create(
            $user,
            $token
        );
    }
}