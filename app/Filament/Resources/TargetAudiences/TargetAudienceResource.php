<?php

namespace App\Filament\Resources\TargetAudiences;

use App\Filament\Resources\TargetAudiences\Pages\CreateTargetAudience;
use App\Filament\Resources\TargetAudiences\Pages\EditTargetAudience;
use App\Filament\Resources\TargetAudiences\Pages\ListTargetAudiences;
use App\Filament\Resources\TargetAudiences\Schemas\TargetAudienceForm;
use App\Filament\Resources\TargetAudiences\Tables\TargetAudiencesTable;
use App\Models\TargetAudience;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TargetAudienceResource extends Resource
{
    protected static ?string $model = TargetAudience::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return TargetAudienceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TargetAudiencesTable::configure($table);
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
            'index' => ListTargetAudiences::route('/'),
            'create' => CreateTargetAudience::route('/create'),
            'edit' => EditTargetAudience::route('/{record}/edit'),
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
