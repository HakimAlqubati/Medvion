<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── المحتوى ──────────────────────────────────────────────────
                Section::make(__('admin.pages.sections.content'))
                    ->description(__('admin.pages.sections.content_description'))
                    ->icon('heroicon-o-document-text')
                    ->schema([

                        TextInput::make('title')
                            ->label(__('admin.pages.fields.title'))
                            ->placeholder(__('admin.pages.fields.title_placeholder'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('slug')
                            ->label(__('admin.pages.fields.slug'))
                            ->placeholder(__('admin.pages.fields.slug_placeholder'))
                            ->helperText(__('admin.pages.fields.slug_hint'))
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label(__('admin.pages.fields.content'))
                            ->toolbarButtons([
                                'bold', 'italic', 'underline', 'strike',
                                'bulletList', 'orderedList',
                                'h2', 'h3', 'h4',
                                'link', 'blockquote',
                                'codeBlock', 'redo', 'undo',
                            ])
                            ->columnSpanFull(),

                    ])->columnSpan(2),

                // ── الإعدادات ─────────────────────────────────────────────────
                Section::make(__('admin.pages.sections.settings'))
                    ->description(__('admin.pages.sections.settings_description'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([

                        Toggle::make('is_active')
                            ->label(__('admin.pages.fields.is_active'))
                            ->helperText(__('admin.pages.fields.is_active_hint'))
                            ->default(true)
                            ->columnSpanFull(),

                    ])->columnSpan(1),

            ])
            ->columns(3);
    }
}
