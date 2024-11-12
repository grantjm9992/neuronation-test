<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\User;
use App\Domain\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private readonly User $user
    ) {
    }

    public function findById(int $id): ?User
    {
        return $this->user::find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->user::where('email', $email)->first();
    }

    public function create(array $data): User
    {
        return $this->user::create($data);
    }
}
