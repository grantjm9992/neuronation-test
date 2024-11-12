<?php

namespace App\Infrastructure\Exception\NotFound;

use App\Infrastructure\Exception\ExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SessionNotFoundException extends NotFoundHttpException implements ExceptionInterface
{
    public function __construct()
    {
        parent::__construct('Session not found');
    }

    public function _getCode(): int
    {
        return $this->getStatusCode();
    }
}