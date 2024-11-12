<?php

namespace App\Application\Services\Auth\Login;

use App\Domain\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginWithUserService implements LoginWithUserServiceInterface
{
    public function __invoke(User $user): string
    {
        return Auth::login($user);
    }
}