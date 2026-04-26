<?php

namespace App\Filament\Resources\Testimonials\Tables;

use App\Enums\TestimonialStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar_image')
                    ->label(__('admin.testimonials.fields.avatar_image'))
                    ->circular(),

                TextColumn::make('client_name')
                    ->label(__('admin.testimonials.fields.client_name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('role')
                    ->label(__('admin.testimonials.fields.role'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('rating')
                    ->label(__('admin.testimonials.fields.rating'))
                    ->sortable()
                    ->formatStateUsing(fn (int $state): string => str_repeat('⭐', $state)),

                TextColumn::make('status')
                    ->label(__('admin.testimonials.fields.status'))
                    ->badge()
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
