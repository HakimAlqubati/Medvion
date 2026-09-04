<?php

namespace App\Enums;

enum UserTypeEnum: string
{
    case ADMIN = 'admin';
    case STUDENT = 'student';
    case INSTRUCTOR = 'instructor';

    /**
     * Get the readable label for the user type.
     */
    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'إداري (Admin)',
            self::STUDENT => 'طالب / متدرب (Student)',
            // self::INSTRUCTOR => 'محاضر / مدرب (Instructor)',
        };
    }

    /**
     * Determine if this user type has admin access privileges.
     */
    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }
}
