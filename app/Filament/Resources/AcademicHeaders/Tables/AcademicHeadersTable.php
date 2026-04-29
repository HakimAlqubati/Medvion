<?php

namespace App\Filament\Resources\AcademicHeaders\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

class AcademicHeadersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('admin.id'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('admin.academic_headers.fields.title'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('experts_count')
                    ->label(__('admin.academic_headers.sections.experts'))
                    ->counts('experts')
                    ->badge(),
                ToggleColumn::make('is_active')
                    ->label(__('admin.academic_headers.fields.is_active')),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
