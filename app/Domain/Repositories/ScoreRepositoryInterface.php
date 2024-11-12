<?php

namespace App\Domain\Repositories;

interface ScoreRepositoryInterface
{
    public function save(array $score): void;
}