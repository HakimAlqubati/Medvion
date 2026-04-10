<?php

namespace App\Filament\Resources\Surveys\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\KeyValue;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Schema;

class SurveyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Wizard\Step::make(__('admin.surveys.sections.content'))
                        ->description(__('admin.surveys.sections.content_description'))
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            TextInput::make('title')
                                ->label(__('admin.surveys.fields.title'))
                                ->required()
                                ->maxLength(255),

                            Textarea::make('description')
                                ->label(__('admin.surveys.fields.description'))
                                ->rows(8),

                            Toggle::make('is_active')
                                ->label(__('admin.surveys.fields.is_active'))
                                ->default(true),
                        ]),

                    Wizard\Step::make(__('admin.surveys.sections.questions'))
                        ->description(__('admin.surveys.sections.questions_description'))
                        ->icon('heroicon-o-question-mark-circle')
                        ->schema([
                            Repeater::make('questions')
                                ->relationship()
                                ->label(__('admin.surveys.sections.questions'))
                                ->schema([
                                    TextInput::make('question_text')
                                        ->label(__('admin.survey_questions.fields.question_text'))
                                        ->required()
                                        ->columnSpan(2),

                                    Select::make('type')
                                        ->label(__('admin.survey_questions.fields.type'))
                                        ->options([
                                            'short_text' => __('admin.survey_questions.types.short_text'),
                                            'long_text' => __('admin.survey_questions.types.long_text'),
                                            'email' => __('admin.survey_questions.types.email'),
                                            'phone' => __('admin.survey_questions.types.phone'),
                                            'radio' => __('admin.survey_questions.types.radio'),
                                            'checkboxes' => __('admin.survey_questions.types.checkboxes'),
                                            'select' => __('admin.survey_questions.types.select'),
                                            'file' => __('admin.survey_questions.types.file'),
                                        ])
                                        ->required()
                                        ->reactive(),

                                    KeyValue::make('options')
                                        ->label(__('admin.survey_questions.fields.options'))
                                        ->visible(fn($get) => in_array($get('type'), ['radio', 'checkboxes', 'select']))
                                        ->columnSpanFull(),

                                    Toggle::make('is_required')
                                        ->label(__('admin.survey_questions.fields.is_required'))
                                        ->default(true),

                                    TextInput::make('order')
                                        ->label(__('admin.survey_questions.fields.order'))
                                        ->numeric()
                                        ->default(0),
                                ])
                                ->columns(3)
                                ->defaultItems(0)
                                ->reorderable('order'),
                        ]),
                ])->columnSpanFull()
                    ->skippable(),
            ])
            ->columns(1);
    }
}
