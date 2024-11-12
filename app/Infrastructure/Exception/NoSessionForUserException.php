<?php

namespace App\Infrastructure\Exception;

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
