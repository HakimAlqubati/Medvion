<?php

namespace App\Filament\Resources\Features;

use App\Filament\Resources\Features\Pages\CreateFeature;
use App\Filament\Resources\Features\Pages\EditFeature;
use App\Filament\Resources\Features\Pages\ListFeatures;
use App\Filament\Resources\Features\Schemas\FeatureForm;
use App\Filament\Resources\Features\Tables\FeaturesTable;
use App\Models\Feature;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class FeatureResource extends Resource
{
    use Translatable;
    protected static ?string $model = Feature::class;

    public static function getModelLabel(): string
    {
        return __('admin.features.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.features.plural_label');
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return FeatureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeaturesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFeatures::route('/'),
            'create' => CreateFeature::route('/create'),
            'edit' => EditFeature::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
