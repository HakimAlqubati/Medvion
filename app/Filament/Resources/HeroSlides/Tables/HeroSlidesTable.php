<?php

namespace App\Filament\Resources\HeroSlides\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HeroSlidesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_1')
                    ->label(__('admin.hero_slides.fields.title_1'))
                    ->searchable()
                    ->tooltip(fn($state) => $state)
                    ->limit(50)
                    ->sortable(),
                TextColumn::make('title_2')
                    ->label(__('admin.hero_slides.fields.title_2'))
                    ->searchable()
                    ->tooltip(fn($state) => $state)
                    ->limit(50)
                    ->sortable(),
                TextColumn::make('subtitle')
                    ->label(__('admin.hero_slides.fields.subtitle'))
                    ->searchable()
                    ->tooltip(fn($state) => $state)
                    ->limit(50)
                    ->sortable(),
                ImageColumn::make('image')
                    ->label(__('admin.hero_slides.fields.image'))
                    // ->disk('public')
                    ->sortable(),
                TextColumn::make('sort_order')
                    ->label(__('admin.sort_order'))
                    ->searchable()
                    ->alignCenter()
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
