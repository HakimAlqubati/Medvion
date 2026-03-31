<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── المحتوى ──────────────────────────────────────────────────
                Section::make(__('admin.features.sections.content'))
                    ->description(__('admin.features.sections.content_description'))
                    ->icon('heroicon-o-sparkles')
                    ->schema([

                        TextInput::make('title')
                            ->label(__('admin.features.fields.title'))
                            ->placeholder(__('admin.features.fields.title_placeholder'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label(__('admin.features.fields.description'))
                            ->placeholder(__('admin.features.fields.description_placeholder'))
                            ->rows(4)
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        TextInput::make('icon')
                            ->label(__('admin.features.fields.icon'))
                            ->placeholder(__('admin.features.fields.icon_placeholder'))
                            ->helperText(__('admin.features.fields.icon_hint'))
                            ->maxLength(100)
                            ->columnSpanFull(),

                    ])->columnSpan(2),

                // ── الإعدادات ─────────────────────────────────────────────────
                Section::make(__('admin.features.sections.settings'))
                    ->description(__('admin.features.sections.settings_description'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([

                        TextInput::make('sort_order')
                            ->label(__('admin.features.fields.sort_order'))
                            ->helperText(__('admin.features.fields.sort_order_hint'))
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label(__('admin.features.fields.is_active'))
                            ->helperText(__('admin.features.fields.is_active_hint'))
                            ->default(true)
                            ->columnSpanFull(),

                    ])->columnSpan(1),

            ])
            ->columns(3);
    }
}
