<?php

namespace App\Filament\Resources\AcademicHeaders\Pages;

use App\Filament\Resources\AcademicHeaders\AcademicHeaderResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateAcademicHeader extends CreateRecord
{
    use Translatable;
    protected static string $resource = AcademicHeaderResource::class;
       protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
