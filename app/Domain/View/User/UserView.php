<?php

namespace App\Domain\View\User;

class UserView
{
    public function __construct(
        public string $email,
        public string $status,
    ) {
    }
}