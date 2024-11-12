<?php

namespace App\Infrastructure\Exception\NotFound;

use App\Infrastructure\Exception\ExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExerciseNotFoundException extends NotFoundHttpException implements ExceptionInterface
{
    public function __construct()
    {
        parent::__construct('Exercise not found');
    }

    public function _getCode(): int
    {
        return 404;
    }
}