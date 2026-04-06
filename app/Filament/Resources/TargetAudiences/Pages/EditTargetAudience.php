<?php

namespace App\Filament\Resources\TargetAudiences\Pages;

use App\Filament\Resources\TargetAudiences\TargetAudienceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;

class EditTargetAudience extends EditRecord
{
    use Translatable;

    protected static string $resource = TargetAudienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),

            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
