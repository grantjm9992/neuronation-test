<?php

namespace App\Application\Services\Auth\Login;


use App\Domain\View\Auth\UserLoggedInView;

interface LogInWithCredentialsServiceInterface
{
    public function __invoke(array $credentials): UserLoggedInView;
}
