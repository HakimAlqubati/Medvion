<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort("id", "desc")
            ->striped()
            ->columns([
                TextColumn::make("name")
                    ->label(__('admin.users.fields.name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make("email")
                    ->label(__('admin.users.fields.email'))
                    ->searchable()->copyable()
                    ->sortable(),
                TextColumn::make("email_verified_at")
                    ->label(__('admin.users.fields.email_verified_at'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make("created_at")
                    ->label(__('admin.users.fields.created_at'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
