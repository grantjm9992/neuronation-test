<?php

namespace App\Application\Services\Auth\Password;

use Illuminate\Support\Facades\Hash;

class PasswordHash implements PasswordHashInterface
{
    public function __invoke(string $password): string
    {
        return Hash::make($password);
    }
}
