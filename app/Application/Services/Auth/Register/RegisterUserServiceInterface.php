<?php

namespace App\Application\Services\Auth\Register;

use App\Domain\View\Auth\UserRegisteredView;

interface RegisterUserServiceInterface
{
    public function __invoke(string $email, string $password): UserRegisteredView;
}