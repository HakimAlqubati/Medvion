<?php

namespace App\Filament\Resources\AcademicHeaders;

use App\Filament\Resources\AcademicHeaders\Pages\CreateAcademicHeader;
use App\Filament\Resources\AcademicHeaders\Pages\EditAcademicHeader;
use App\Filament\Resources\AcademicHeaders\Pages\ListAcademicHeaders;
use App\Filament\Resources\AcademicHeaders\Schemas\AcademicHeaderForm;
use App\Filament\Resources\AcademicHeaders\Tables\AcademicHeadersTable;
use App\Models\AcademicHeader;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class AcademicHeaderResource extends Resource
{
    use Translatable;
    protected static ?string $model = AcademicHeader::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getModelLabel(): string
    {
        return __('admin.academic_headers.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.academic_headers.plural_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('admin.navigation.groups.site');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return AcademicHeaderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademicHeadersTable::configure($table);
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
            'index' => ListAcademicHeaders::route('/'),
            'create' => CreateAcademicHeader::route('/create'),
            'edit' => EditAcademicHeader::route('/{record}/edit'),
        ];
    }
}
