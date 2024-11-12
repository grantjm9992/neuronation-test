<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Exercise;
use App\Domain\Repositories\ExerciseRepositoryInterface;

class ExerciseRepository implements ExerciseRepositoryInterface
{
    public function findById(int $id): ?Exercise
    {
        return Exercise::find($id);
    }
}
