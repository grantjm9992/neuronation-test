<?php

namespace App\Application\Query;

class GetSessionHistoryForUserQuery
{
    public function __construct(
        private string $userId,
        private int $limit
    ) {
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }
}
