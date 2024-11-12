<?php

namespace App\Domain\View\Auth;

use App\Domain\View\User\UserView;

class UserLoggedInView
{
    public string $status = 'success';
    public array $authorisation;

    public function __construct(
        public UserView $user,
        string $token,
    ) {
        $this->authorisation = [
            'token' => $token,
            'type' => 'bearer',
        ];
    }
}