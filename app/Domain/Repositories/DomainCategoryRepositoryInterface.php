<?php

namespace App\Domain\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface DomainCategoryRepositoryInterface
{
    public function getDomainCategoriesForSession(string $sessionId): array|Collection;
}
