<?php

namespace App\Enums;

enum RolesEnum: string
{
    // The roles required for the Medvion platform
    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case MODERATOR = 'moderator';

    /**
     * Get the readable label for the role.
     * Useful for UI displays (e.g., Dropdowns, Badges, DataTables).
     */
    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'المدير (Admin)',
            self::EDITOR => 'المحرر (Editor)',
            self::MODERATOR => 'المشرف (Moderator)',
        };
    }
    
    /**
     * Optional helper: Get the role's primary responsibility based on the contract requirements.
     */
    public function description(): string
    {
        return match ($this) {
            self::ADMIN => 'يتحكم بكل شيء في الموقع',
            self::EDITOR => 'يضيف أو يعدل محتوى الدورات',
            self::MODERATOR => 'يراجع التعليقات، ويرد على الرسائل، ويتابع الطلبات',
        };
    }
}