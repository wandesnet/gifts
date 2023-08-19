<?php

namespace App\Enums;

enum UserRole: int
{
    case Admin = 1;
    case User  = 2;
    case Guest = 3;

    public function color(): string
    {
        return match ($this) {
            self::Admin => 'red',
            self::User  => 'blue',
            self::Guest => 'gray',
        };
    }

    public function translate(): string
    {
        return __('app.user.role.' . $this->value);
    }
}
