<?php

namespace App\Filament\Resources\Qualifications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class QualificationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->striped()
            ->columns([
                TextColumn::make('id')
                    ->label(__('admin.id'))
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('name')
                    ->label(__('admin.qualifications.fields.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('users_count')
                    ->label(__('admin.qualifications.fields.users_count'))
                    ->counts('users')
                    ->badge()
                    ->color('primary')
                    ->alignCenter(),

                IconColumn::make('is_active')
                    ->label(__('admin.is_active'))
                    ->boolean()
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('sort_order')
                    ->label(__('admin.sort_order'))
                    ->sortable()
                    ->alignCenter(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
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
