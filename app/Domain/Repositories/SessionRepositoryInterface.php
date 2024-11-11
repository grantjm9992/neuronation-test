<?php

namespace app\Domain\Repositories;

use app\Domain\Models\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface SessionRepositoryInterface
{
    public function getHistoryForUser(string $userId, int $limit = 12): Collection|array;

    public function findLastSessionForUser(string $userId): ?Model;
}