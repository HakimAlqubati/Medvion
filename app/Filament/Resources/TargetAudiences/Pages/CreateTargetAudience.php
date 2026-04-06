<?php

namespace App\Filament\Resources\TargetAudiences\Pages;

use App\Filament\Resources\TargetAudiences\TargetAudienceResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateTargetAudience extends CreateRecord
{
    use Translatable;

    protected static string $resource = TargetAudienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
