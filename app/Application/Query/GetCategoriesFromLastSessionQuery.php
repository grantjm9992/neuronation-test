<?php

namespace App\Application\Query;

class GetCategoriesFromLastSessionQuery
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
