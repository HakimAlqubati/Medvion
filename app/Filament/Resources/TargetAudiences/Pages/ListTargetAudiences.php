<?php

namespace App\Filament\Resources\TargetAudiences\Pages;

use App\Filament\Resources\TargetAudiences\TargetAudienceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTargetAudiences extends ListRecords
{
    protected static string $resource = TargetAudienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
