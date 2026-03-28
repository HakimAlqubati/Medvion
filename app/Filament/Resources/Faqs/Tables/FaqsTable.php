<?php

namespace App\Filament\Resources\Faqs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class FaqsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                TextColumn::make('question')
                    ->label(__('admin.faqs.fields.question'))
                    ->searchable()
                    ->sortable()
                    ->tooltip(fn($state) => $state)
                    ->limit(50),
                TextColumn::make('answer')
                    ->label(__('admin.faqs.fields.answer'))
                    ->searchable()
                    ->sortable()
                    ->tooltip(fn($state) => $state)
                    ->limit(50),
                TextColumn::make('sort_order')
                    ->label(__('admin.faqs.fields.sort_order'))
                    ->searchable()
                    ->alignCenter()
                    ->sortable(),
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
