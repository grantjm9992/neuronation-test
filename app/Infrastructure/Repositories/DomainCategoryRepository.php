<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\DomainCategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

readonly class DomainCategoryRepository implements DomainCategoryRepositoryInterface
{
    public function getDomainCategoriesForSession(string $sessionId): array|Collection
    {
        $query = <<<EOD
            SELECT
                d.name
            FROM 
                scores
            LEFT JOIN   
                    exercises e 
                        ON scores.exercise_id = e.exercise_id
                    LEFT JOIN 
                        domain_categories d
                            ON e.category_id = d.category_id 
            WHERE scores.session_id = ?
        EOD;

        return DB::select(
            query: $query,
            bindings: [$sessionId],
        );
    }
}