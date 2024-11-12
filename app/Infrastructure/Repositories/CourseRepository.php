<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Course;
use App\Domain\Repositories\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{
    public function findById(int $id): ?Course
    {
        return Course::find($id);
    }
}
