<?php

namespace App\Filament\Resources\Specializations\Schemas;

use App\Models\Specialization;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SpecializationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.specializations.sections.info'))
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextInput::make('name')
                            ->label(__('admin.specializations.fields.name'))
                            ->placeholder(__('admin.specializations.fields.name_placeholder'))
                            ->required()
                            ->maxLength(150)
                            ->columnSpanFull(),
                    ])->columnSpan(2),

                Section::make(__('admin.specializations.sections.settings'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        TextInput::make('sort_order')
                            ->label(__('admin.sort_order'))
                            ->numeric()
                            ->default(function () {
                                $last = Specialization::orderBy('sort_order', 'desc')->first();
                                return $last ? $last->sort_order + 1 : 1;
                            })
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label(__('admin.is_active'))
                            ->default(true)
                            ->columnSpanFull(),
                    ])->columnSpan(1),
            ])
            ->columns(3);
    }
}
