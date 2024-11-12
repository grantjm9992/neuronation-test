<?php

namespace App\Infrastructure\Exception;

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