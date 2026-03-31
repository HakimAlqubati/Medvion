<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── السؤال والإجابة ───────────────────────────────────────────
                Section::make(__('admin.faqs.sections.content'))
                    ->description(__('admin.faqs.sections.content_description'))
                    ->icon('heroicon-o-question-mark-circle')
                    ->schema([

                        TextInput::make('question')
                            ->label(__('admin.faqs.fields.question'))
                            ->placeholder(__('admin.faqs.fields.question_placeholder'))
                            ->required()
                            ->maxLength(500)
                            ->columnSpanFull(),

                        Textarea::make('answer')
                            ->label(__('admin.faqs.fields.answer'))
                            ->placeholder(__('admin.faqs.fields.answer_placeholder'))
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),

                    ])->columnSpan(2),

                // ── الإعدادات ─────────────────────────────────────────────────
                Section::make(__('admin.faqs.sections.settings'))
                    ->description(__('admin.faqs.sections.settings_description'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([

                        TextInput::make('sort_order')
                            ->label(__('admin.faqs.fields.sort_order'))
                            ->helperText(__('admin.faqs.fields.sort_order_hint'))
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label(__('admin.faqs.fields.is_active'))
                            ->helperText(__('admin.faqs.fields.is_active_hint'))
                            ->default(true)
                            ->columnSpanFull(),

                    ])->columnSpan(1),

            ])
            ->columns(3);
    }
}
