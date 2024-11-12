<?php

namespace App\Application\ViewFactory\User;

use App\Domain\Models\User;
use App\Domain\View\User\UserView;

class UserViewFactory
{
    public static function create(User $user): UserView
    {
        return new UserView(
            email: $user->email,
            status: $user->status
        );
    }
}