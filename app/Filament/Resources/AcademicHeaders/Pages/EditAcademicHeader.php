<?php

namespace App\Filament\Resources\AcademicHeaders\Pages;

use App\Filament\Resources\AcademicHeaders\AcademicHeaderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;

class EditAcademicHeader extends EditRecord
{
    use Translatable;
    protected static string $resource = AcademicHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            DeleteAction::make(),
        ];
    }
}
