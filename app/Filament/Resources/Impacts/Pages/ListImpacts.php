<?php

namespace App\Filament\Resources\Impacts\Pages;

use App\Filament\Resources\Impacts\ImpactResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ListImpacts extends ListRecords
{
    use Translatable;

    protected static string $resource = ImpactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),

            CreateAction::make(),
        ];
    }
}
