<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TestimonialStatus: string implements HasLabel, HasColor
{
    case ACTIVE = 'active';
    case HIDDEN = 'hidden';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIVE => __('admin.testimonials.status_active') ?? 'Active',
            self::HIDDEN => __('admin.testimonials.status_hidden') ?? 'Hidden',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::HIDDEN => 'danger',
        };
    }
}
