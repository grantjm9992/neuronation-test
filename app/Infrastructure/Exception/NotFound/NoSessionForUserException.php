<?php

namespace App\Infrastructure\Exception\NotFound;

use App\Infrastructure\Exception\ExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NoSessionForUserException extends NotFoundHttpException implements ExceptionInterface
{
    public function __construct()
    {
        parent::__construct(message: "No session for user");
    }

    public function _getCode(): int
    {
        return 404;
    }
}
