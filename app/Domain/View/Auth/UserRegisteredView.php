<?php

namespace App\Domain\View\Auth;

class UserRegisteredView extends UserLoggedInView
{
    public string $message = 'User created successfully';
}
