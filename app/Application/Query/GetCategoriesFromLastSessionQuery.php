<?php

namespace App\Application\Query;

readonly class GetCategoriesFromLastSessionQuery
{
    public function __construct(
        private string $userId
    ) {
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}
