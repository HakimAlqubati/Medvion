<?php

namespace App\Filament\Resources\Qualifications\Schemas;

use App\Models\Qualification;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class QualificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.qualifications.sections.info'))
                    ->icon('heroicon-o-academic-cap')
                    ->schema([
                        TextInput::make('name')
                            ->label(__('admin.qualifications.fields.name'))
                            ->placeholder(__('admin.qualifications.fields.name_placeholder'))
                            ->required()
                            ->maxLength(150)
                            ->columnSpanFull(),
                    ])->columnSpan(2),

                Section::make(__('admin.qualifications.sections.settings'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        TextInput::make('sort_order')
                            ->label(__('admin.sort_order'))
                            ->numeric()
                            ->default(function () {
                                $last = Qualification::orderBy('sort_order', 'desc')->first();
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
