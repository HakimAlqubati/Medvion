<?php

namespace App\Filament\Resources\Courses\Pages;

use App\Filament\Resources\Courses\CourseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\ViewRecord\Concerns\Translatable;

class ViewCourse extends ViewRecord
{
    use Translatable;
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),

            EditAction::make(),
        ];
    }
}
