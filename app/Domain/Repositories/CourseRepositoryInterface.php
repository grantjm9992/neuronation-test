<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Course;

interface CourseRepositoryInterface
{
    public function findById(int $id): ?Course;
}