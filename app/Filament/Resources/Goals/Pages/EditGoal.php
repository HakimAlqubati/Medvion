<?php

namespace App\Filament\Resources\Goals\Pages;

use App\Filament\Resources\Goals\GoalResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;

class EditGoal extends EditRecord
{
    use Translatable;

    protected static string $resource = GoalResource::class;

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
