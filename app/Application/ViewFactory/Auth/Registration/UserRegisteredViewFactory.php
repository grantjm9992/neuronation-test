<?php

namespace App\Application\ViewFactory\Auth\Registration;

use App\Application\ViewFactory\User\UserViewFactory;
use App\Domain\Models\User;
use App\Domain\View\Auth\UserRegisteredView;

class UserRegisteredViewFactory
{
    public static function create(User $user, string $token): UserRegisteredView
    {
        $userView = UserViewFactory::create($user);
        return new UserRegisteredView(
            user: $userView,
            token: $token,
        );
    }
}