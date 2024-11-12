<?php

namespace App\Domain\Enum;

enum UserRole: string
{
    case ADMIN = 'admin';
    case USER = 'user';
}
