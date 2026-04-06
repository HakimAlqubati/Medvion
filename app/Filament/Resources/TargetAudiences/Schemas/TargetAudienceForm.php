<?php

namespace App\Filament\Resources\TargetAudiences\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use App\Models\TargetAudience;

class TargetAudienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.abouts.sections.content'))
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextInput::make('title')
                            ->label(__('admin.target_audiences.fields.title'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])->columnSpan(2),

                Section::make(__('admin.abouts.sections.settings'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        TextInput::make('sort_order')
                            ->label(__('admin.sort_order'))
                            ->numeric()
                            ->default(function () {
                                $last = TargetAudience::orderBy('sort_order', 'desc')->first();
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
