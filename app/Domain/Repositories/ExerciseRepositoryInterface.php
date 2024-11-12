<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Exercise;

interface ExerciseRepositoryInterface
{
    public function findById(int $id): ?Exercise;
}