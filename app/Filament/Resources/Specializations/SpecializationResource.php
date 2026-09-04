<?php

namespace App\Filament\Resources\Specializations;

use App\Filament\Resources\Specializations\Pages\CreateSpecialization;
use App\Filament\Resources\Specializations\Pages\EditSpecialization;
use App\Filament\Resources\Specializations\Pages\ListSpecializations;
use App\Filament\Resources\Specializations\Schemas\SpecializationForm;
use App\Filament\Resources\Specializations\Tables\SpecializationsTable;
use App\Models\Specialization;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class SpecializationResource extends Resource
{
    use Translatable;

    protected static ?string $model = Specialization::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('admin.specializations.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.specializations.plural_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('admin.navigation.groups.management');
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return SpecializationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpecializationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListSpecializations::route('/'),
            'create' => CreateSpecialization::route('/create'),
            'edit'   => EditSpecialization::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
