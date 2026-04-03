<?php

namespace App\Filament\Resources\CourseRegistrations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CourseRegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('course.title')
                    ->label(__('admin.course_registrations.fields.course'))
                    ->sortable()
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('full_name')
                    ->label(__('admin.course_registrations.fields.full_name'))
                    ->sortable()
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('email')
                    ->label(__('admin.course_registrations.fields.email'))
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('phone')
                    ->label(__('admin.course_registrations.fields.phone'))
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->label(__('admin.course_registrations.fields.status'))
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => __('admin.course_registrations.status.' . $state))
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'contacted' => 'info',
                        'confirmed' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin.course_registrations.fields.created_at') ?? 'Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
