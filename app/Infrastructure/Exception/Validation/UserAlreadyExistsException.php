<?php

namespace App\Infrastructure\Exception\Validation;

use App\Infrastructure\Exception\ExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserAlreadyExistsException extends NotFoundHttpException implements ExceptionInterface
{
    public function __construct()
    {
        parent::__construct(
            message: 'User already exists.',
        );
    }

    public function _getCode(): int
    {
        return 400;
    }
}