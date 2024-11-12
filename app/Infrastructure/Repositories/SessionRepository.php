<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Session;
use App\Domain\Repositories\SessionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

readonly class SessionRepository implements SessionRepositoryInterface
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
                'normalized_score',
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

    public function save(array $session): void
    {
        $this->session::create($session);
    }

    public function findById(int $id): ?Model
    {
        return $this->session::find($id);
    }
}