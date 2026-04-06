<?php

namespace App\Filament\Resources\TargetAudiences\Pages;

use App\Filament\Resources\TargetAudiences\TargetAudienceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ListTargetAudiences extends ListRecords
{
    use Translatable;

    protected static string $resource = TargetAudienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),

            CreateAction::make(),
        ];
    }
}
