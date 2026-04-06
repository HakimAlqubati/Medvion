<?php

namespace App\Filament\Resources\Goals\Pages;

use App\Filament\Resources\Goals\GoalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ListGoals extends ListRecords
{
    use Translatable;

    protected static string $resource = GoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),

            CreateAction::make(),
        ];
    }
}
