<?php

namespace App\Filament\Resources\AcademicHeaders\Pages;

use App\Filament\Resources\AcademicHeaders\AcademicHeaderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAcademicHeader extends EditRecord
{
    protected static string $resource = AcademicHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
