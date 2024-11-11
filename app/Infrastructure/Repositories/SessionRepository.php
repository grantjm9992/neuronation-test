<?php

namespace app\Infrastructure\Repositories;

use app\Domain\Models\Session;
use app\Domain\Repositories\SessionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class SessionRepository implements SessionRepositoryInterface
{
    public function __construct(
        private Session $session
    ) {
    }

    public function getHistoryForUser(string $userId, int $limit = 12): Collection|array
    {
        return $this->session
            ->newQuery()
            ->select([
                'score',
                'timestamp',
            ])
            ->where('user_id', $userId)
            ->orderBy('timestamp', 'DESC')
            ->limit($limit)
            ->get();
    }

    public function findLastSessionForUser(string $userId): ?Model
    {
        return $this->session
            ->newQuery()
            ->where('user_id', $userId)
            ->orderBy('timestamp', 'DESC')
            ->first();
    }
}