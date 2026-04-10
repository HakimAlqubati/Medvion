<?php

namespace App\Filament\Resources\SurveySubmissions\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section as FormSection;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\FileUpload;

class SurveySubmissionSchema
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.survey_submissions.sections.info'))
                    ->icon('heroicon-o-user')
                    ->schema([
                        TextInput::make('applicant_email')
                            ->label(__('admin.survey_submissions.fields.applicant_email'))
                            ->disabled(),
                        
                        Select::make('user_id')
                            ->label(__('admin.survey_submissions.fields.user'))
                            ->relationship('user', 'name')
                            ->disabled(),
                    ])->columnSpan(2),

                Section::make(__('admin.survey_submissions.sections.evaluation'))
                    ->icon('heroicon-o-star')
                    ->schema([
                        Select::make('status')
                            ->label(__('admin.survey_submissions.fields.status'))
                            ->options([
                                'pending' => __('admin.survey_submissions.status.pending'),
                                'elite' => __('admin.survey_submissions.status.elite'),
                                'priority' => __('admin.survey_submissions.status.priority'),
                                'rejected' => __('admin.survey_submissions.status.rejected'),
                            ])
                            ->required(),

                        TextInput::make('score')
                            ->label(__('admin.survey_submissions.fields.score'))
                            ->numeric()
                            ->default(0),
                    ])->columnSpan(1),

                Section::make(__('admin.survey_submissions.sections.answers'))
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->schema([
                        Repeater::make('answers')
                            ->relationship()
                            ->label(__('admin.survey_submissions.sections.answers'))
                            ->schema([
                                Select::make('survey_question_id')
                                    ->label(__('admin.survey_questions.label'))
                                    ->relationship('question', 'question_text')
                                    ->disabled()
                                    ->columnSpan(2),

                                TextInput::make('answer_value')
                                    ->label(__('admin.survey_questions.fields.options'))
                                    ->disabled()
                                    ->visible(fn ($get) => !empty($get('answer_value'))),
                                
                                Placeholder::make('answer_json_view')
                                    ->label(__('admin.survey_questions.fields.options'))
                                    ->content(fn ($record) => $record ? implode(', ', (array) $record->answer_json) : '')
                                    ->visible(fn ($get) => !empty($get('answer_json'))),
                            ])
                            ->addable(false)
                            ->deletable(false)
                            ->columns(3)
                            ->columnSpanFull(),
                    ])->columnSpanFull(),
            ])
            ->columns(3);
    }
}
