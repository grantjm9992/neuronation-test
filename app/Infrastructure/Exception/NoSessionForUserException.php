<?php

namespace app\Infrastructure\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NoSessionForUserException extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct("No session for user");
    }
}
