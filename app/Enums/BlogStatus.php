<?php

namespace App\Enums;

enum BlogStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => __('land.status_draft') ?? 'Draft',
            self::PUBLISHED => __('land.status_published') ?? 'Published',
            self::ARCHIVED => __('land.status_archived') ?? 'Archived',
        };
    }
}
