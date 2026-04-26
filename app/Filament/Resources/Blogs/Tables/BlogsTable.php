<?php

namespace App\Filament\Resources\Blogs\Tables;

use App\Enums\BlogStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('main_image')
                    ->label(__('admin.blogs.fields.main_image'))
                    ->circular(),

                TextColumn::make('title')
                    ->label(__('admin.blogs.fields.title'))
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('status')
                    ->label(__('admin.blogs.fields.status'))
                    ->badge()
                    ->sortable(),

                TextColumn::make('read_count')
                    ->label(__('admin.blogs.fields.read_count'))
                    ->sortable(),

                TextColumn::make('published_at')
                    ->label(__('admin.blogs.fields.published_at'))
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('creator.name')
                    ->label(__('admin.blogs.fields.created_by'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('status')
                    ->label(__('admin.blogs.fields.status'))
                    ->options(BlogStatus::class),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
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
