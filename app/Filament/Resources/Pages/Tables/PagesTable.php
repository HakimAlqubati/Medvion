<?php

namespace App\Filament\Resources\Pages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('slug')
                    ->label(__('admin.pages.fields.slug'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->label(__('admin.pages.fields.title'))
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label(__('admin.is_active'))
                    ->boolean(),
                TextColumn::make('content')
                    ->label(__('admin.pages.fields.content'))
                    ->searchable()
                    ->tooltip(fn($state) => $state)
                    ->limit(50)
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
