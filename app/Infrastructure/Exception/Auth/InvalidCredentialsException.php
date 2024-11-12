<?php

namespace App\Infrastructure\Exception\Auth;

use App\Infrastructure\Exception\ExceptionInterface;

class InvalidCredentialsException extends \Exception implements ExceptionInterface
{
    public function __construct()
    {
        parent::__construct(
            message: 'Invalid credentials'
        );
    }

    public function _getCode(): int
    {
        return 401;
    }
}