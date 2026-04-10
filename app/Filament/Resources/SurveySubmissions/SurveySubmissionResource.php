<?php

namespace App\Filament\Resources\SurveySubmissions;

use App\Filament\Resources\SurveySubmissions\Pages\EditSurveySubmission;
use App\Filament\Resources\SurveySubmissions\Pages\ListSurveySubmissions;
use App\Filament\Resources\SurveySubmissions\Schemas\SurveySubmissionSchema;
use App\Filament\Resources\SurveySubmissions\Tables\SurveySubmissionTable;
use App\Models\SurveySubmission;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;

class SurveySubmissionResource extends Resource
{
    protected static ?string $model = SurveySubmission::class;

    public static function getModelLabel(): string
    {
        return __('admin.survey_submissions.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.survey_submissions.plural_label');
    }

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    public static function form(Schema $schema): Schema
    {
        return SurveySubmissionSchema::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SurveySubmissionTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSurveySubmissions::route('/'),
            'edit' => EditSurveySubmission::route('/{record}/edit'),
        ];
    }
    
    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getNavigationBadge() > 0 ? 'warning' : 'gray';
    }
}
