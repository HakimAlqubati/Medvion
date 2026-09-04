<?php

namespace App\Filament\Resources\Qualifications;

use App\Filament\Resources\Qualifications\Pages\CreateQualification;
use App\Filament\Resources\Qualifications\Pages\EditQualification;
use App\Filament\Resources\Qualifications\Pages\ListQualifications;
use App\Filament\Resources\Qualifications\Schemas\QualificationForm;
use App\Filament\Resources\Qualifications\Tables\QualificationsTable;
use App\Models\Qualification;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class QualificationResource extends Resource
{
    use Translatable;

    protected static ?string $model = Qualification::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('admin.qualifications.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.qualifications.plural_label');
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
        return QualificationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QualificationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListQualifications::route('/'),
            'create' => CreateQualification::route('/create'),
            'edit'   => EditQualification::route('/{record}/edit'),
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
