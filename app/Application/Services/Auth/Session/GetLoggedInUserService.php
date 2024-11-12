<?php

namespace App\Application\Services\Auth\Session;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class GetLoggedInUserService implements GetLoggedInUserServiceInterface
{
    private Authenticatable $user;
    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function getUser(): Authenticatable
    {
        return $this->user;
    }

    public function getUserId(): int
    {
        return $this->user->getAuthIdentifier();
    }
}