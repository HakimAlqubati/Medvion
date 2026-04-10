<?php

namespace App\Filament\Resources\SurveySubmissions\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Filters\SelectFilter;

class SurveySubmissionTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('survey.title')
                    ->label(__('admin.surveys.label'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('applicant_email')
                    ->label(__('admin.survey_submissions.fields.applicant_email'))
                    ->searchable(),

                TextColumn::make('status')
                    ->label(__('admin.survey_submissions.fields.status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'elite' => 'success',
                        'priority' => 'info',
                        'pending' => 'warning',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => __("admin.survey_submissions.status.{$state}")),

                TextColumn::make('score')
                    ->label(__('admin.survey_submissions.fields.score'))
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('admin.survey_submissions.fields.created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label(__('admin.survey_submissions.fields.status'))
                    ->options([
                        'pending' => __('admin.survey_submissions.status.pending'),
                        'elite' => __('admin.survey_submissions.status.elite'),
                        'priority' => __('admin.survey_submissions.status.priority'),
                        'rejected' => __('admin.survey_submissions.status.rejected'),
                    ]),
                SelectFilter::make('survey_id')
                    ->label(__('admin.surveys.label'))
                    ->relationship('survey', 'title'),
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
