<?php

namespace App\Filament\Resources\Abouts\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── القسم الرئيسي: المحتوى ─────────────────────────────────────
                Section::make(__('admin.abouts.sections.content'))
                    ->description(__('admin.abouts.sections.content_description'))
                    ->icon('heroicon-o-document-text')
                    ->schema([

                        // العنوان
                        TextInput::make('title')
                            ->label(__('admin.abouts.fields.title'))
                            ->placeholder(__('admin.abouts.fields.title_placeholder'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        // المحتوى
                        RichEditor::make('content')
                            ->label(__('admin.abouts.fields.content'))
                            ->placeholder(__('admin.abouts.fields.content_placeholder'))
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'link',
                                'redo',
                                'undo',
                            ])
                            ->columnSpanFull(),

                    ])->columnSpan(2),

                // ── القسم الجانبي: الإعدادات ───────────────────────────────────
                Section::make(__('admin.abouts.sections.settings'))
                    ->description(__('admin.abouts.sections.settings_description'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([

                        // ترتيب العرض
                        TextInput::make('sort_order')
                            ->label(__('admin.abouts.fields.sort_order'))
                            ->helperText(__('admin.abouts.fields.sort_order_hint'))
                            ->numeric()
                            ->default(function () {
                                $last = \App\Models\About::orderBy('sort_order', 'desc')->first();
                                return $last ? $last->sort_order + 1 : 0;
                            })
                            ->minValue(0)
                            ->columnSpanFull(),

                        // الحالة
                        Toggle::make('is_active')
                            ->label(__('admin.abouts.fields.is_active'))
                            ->helperText(__('admin.abouts.fields.is_active_hint'))
                            ->default(true)
                            ->columnSpanFull(),

                    ])->columnSpan(1),

            ])
            ->columns(3);
    }
}
