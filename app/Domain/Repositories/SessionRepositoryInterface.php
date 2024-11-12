<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface SessionRepositoryInterface
{
    public function getHistoryForUser(string $userId, int $limit = 12): Collection|array;

    public function findLastSessionForUser(string $userId): ?Model;

    public function save(array $session): void;

    public function findById(int $id): ?Model;
}
