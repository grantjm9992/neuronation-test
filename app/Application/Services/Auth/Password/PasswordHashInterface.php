<?php

namespace App\Application\Services\Auth\Password;

interface PasswordHashInterface
{
    public function __invoke(string $password): string;
}