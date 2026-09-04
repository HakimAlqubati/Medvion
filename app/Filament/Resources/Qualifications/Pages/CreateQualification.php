<?php

namespace App\Filament\Resources\Qualifications\Pages;

use App\Filament\Resources\Qualifications\QualificationResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateQualification extends CreateRecord
{
    use Translatable;

    protected static string $resource = QualificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
