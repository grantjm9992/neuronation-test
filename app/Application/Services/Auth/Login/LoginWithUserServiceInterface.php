<?php

namespace App\Application\Services\Auth\Login;

use App\Domain\Models\User;

interface LoginWithUserServiceInterface
{
    public function __invoke(User $user): string;
}