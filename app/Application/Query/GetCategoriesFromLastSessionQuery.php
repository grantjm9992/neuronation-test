<?php

namespace App\Application\Query;

class GetCategoriesFromLastSessionQuery
{
    public function __construct(
        private readonly string $userId
    ) {
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}
