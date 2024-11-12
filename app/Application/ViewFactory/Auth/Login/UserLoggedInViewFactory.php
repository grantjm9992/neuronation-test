<?php

namespace App\Application\ViewFactory\Auth\Login;

use App\Application\ViewFactory\User\UserViewFactory;
use App\Domain\Models\User;
use App\Domain\View\Auth\UserLoggedInView;

class UserLoggedInViewFactory
{
    public static function create(User $user, string $token): UserLoggedInView
    {
        $userView = UserViewFactory::create($user);
        return new UserLoggedInView(
            user: $userView,
            token: $token,
        );
    }
}
