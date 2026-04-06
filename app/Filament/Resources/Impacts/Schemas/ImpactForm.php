<?php

namespace App\Filament\Resources\Impacts\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use App\Models\Impact;

class ImpactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.abouts.sections.content'))
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextInput::make('title')
                            ->label(__('admin.impacts.fields.title'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('content')
                            ->label(__('admin.impacts.fields.content'))
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columnSpan(2),

                Section::make(__('admin.abouts.sections.settings'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        TextInput::make('sort_order')
                            ->label(__('admin.sort_order'))
                            ->numeric()
                            ->default(function () {
                                $last = Impact::orderBy('sort_order', 'desc')->first();
                                return $last ? $last->sort_order + 1 : 0;
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
