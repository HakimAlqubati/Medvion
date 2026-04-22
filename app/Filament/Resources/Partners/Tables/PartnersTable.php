<?php

namespace App\Filament\Resources\Partners\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;

class PartnersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name_ar')
                    ->label(__('admin.partners.fields.name_ar'))
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('name_en')
                    ->label(__('admin.partners.fields.name_en'))
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('partners_count')
                    ->counts('partners')
                    ->label(__('admin.partners.fields.partners_count'))
                    ->badge(),
                    
                TextColumn::make('stat_value')
                    ->label(__('admin.partners.fields.stat_value'))
                    ->searchable(),
                    
                IconColumn::make('is_active')
                    ->label(__('admin.partners.fields.is_active'))
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }
}
