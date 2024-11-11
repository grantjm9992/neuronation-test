<?php

namespace app\Domain\ValueObject;

class UserRole
{
    protected const ADMIN = 'admin';
    protected const USER = 'user';

    public static function admin(): string
    {
        return self::ADMIN;
    }

    public static function user(): string
    {
        return self::USER;
    }
}
