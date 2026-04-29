<?php

namespace App\Filament\Resources\AcademicHeaders\Pages;

use App\Filament\Resources\AcademicHeaders\AcademicHeaderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAcademicHeaders extends ListRecords
{
    protected static string $resource = AcademicHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
