<?php declare(strict_types=1);

namespace App\Infrastructure\Exception;

interface ExceptionInterface
{
    public function _getCode(): int;
    public function getMessage(): string;
}
