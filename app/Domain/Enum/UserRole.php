<?php

namespace app\Domain\Enum;

enum UserRole: string
{
    case ADMIN = 'admin';
    case USER = 'user';
}
