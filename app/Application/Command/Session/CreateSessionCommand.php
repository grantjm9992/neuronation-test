<?php

namespace App\Application\Command\Session;

readonly class CreateSessionCommand
{
    public function __construct(
        private int $userId,
        private int $courseId,
    ) {
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getCourseId(): int
    {
        return $this->courseId;
    }
}
