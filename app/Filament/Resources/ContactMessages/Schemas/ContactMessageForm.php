<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── بيانات المرسل ─────────────────────────────────────────────
                Section::make(__('admin.messages.sections.sender'))
                    ->description(__('admin.messages.sections.sender_description'))
                    ->icon('heroicon-o-user')
                    ->schema([

                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label(__('admin.messages.fields.name'))
                                ->disabled(),

                            TextInput::make('email')
                                ->label(__('admin.messages.fields.email'))
                                ->disabled(),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('phone')
                                ->label(__('admin.messages.fields.phone'))
                                ->disabled(),

                            TextInput::make('subject')
                                ->label(__('admin.messages.fields.subject'))
                                ->disabled(),
                        ]),

                    ])->columnSpan(2),

                // ── الإعدادات ─────────────────────────────────────────────────
                Section::make(__('admin.messages.sections.settings'))
                    ->description(__('admin.messages.sections.settings_description'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([

                        Toggle::make('is_read')
                            ->label(__('admin.messages.fields.is_read'))
                            ->helperText(__('admin.messages.fields.is_read_hint'))
                            ->columnSpanFull(),

                    ])->columnSpan(1),

                // ── محتوى الرسالة ─────────────────────────────────────────────
                Section::make(__('admin.messages.sections.message'))
                    ->description(__('admin.messages.sections.message_description'))
                    ->icon('heroicon-o-envelope-open')
                    ->schema([

                        Textarea::make('message')
                            ->label(__('admin.messages.fields.message'))
                            ->rows(8)
                            ->disabled()
                            ->columnSpanFull(),

                    ])->columnSpanFull(),

            ])
            ->columns(3);
    }
}
