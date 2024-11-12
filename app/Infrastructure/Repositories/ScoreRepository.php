<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Score;
use App\Domain\Repositories\ScoreRepositoryInterface;

readonly class ScoreRepository implements ScoreRepositoryInterface
{
    public function save(array $score): void
    {
        Score::create($score);
    }
}
