<?php

namespace App\Filament\Resources\Surveys\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class SurveyTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('admin.surveys.fields.title'))
                    ->searchable()
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label(__('admin.surveys.fields.is_active'))
                    ->boolean()
                    ->sortable(),

                TextColumn::make('questions_count')
                    ->label(__('admin.surveys.sections.questions'))
                    ->counts('questions'),

                TextColumn::make('submissions_count')
                    ->label(__('admin.survey_submissions.plural_label'))
                    ->counts('submissions'),

                TextColumn::make('creator.name')
                    ->label(__('admin.surveys.fields.created_by'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
