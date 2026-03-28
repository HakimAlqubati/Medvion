<?php

namespace App\Filament\Resources\Courses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CoursesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title")
                    ->label(__('admin.courses.fields.title'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make("brief")
                    ->label(__('admin.courses.fields.brief'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make("price")
                    ->label(__('admin.courses.fields.price'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make("category.name")
                    ->label(__('admin.courses.fields.category'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make("created_at")
                    ->label(__('admin.courses.fields.created_at'))
                    ->searchable()
                    ->sortable(),
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
