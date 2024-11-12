<?php

namespace App\Application\Command\Score;

readonly class CreateScoreCommand
{
    public function __construct(
        private int $sessionId,
        private int $exerciseId,
        private int $userId,
        private int $score,
        private int $startDifficulty,
        private int $endDifficulty,
    ) {
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function getExerciseId(): int
    {
        return $this->exerciseId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getStartDifficulty(): int
    {
        return $this->startDifficulty;
    }

    public function getEndDifficulty(): int
    {
        return $this->endDifficulty;
    }
}
