<?php

namespace App\Application\Services\Auth\Session;

use Illuminate\Contracts\Auth\Authenticatable;

interface GetLoggedInUserServiceInterface
{
    public function getUser(): Authenticatable;

    public function getUserId(): int;
}