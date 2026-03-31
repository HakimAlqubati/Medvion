<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── المعلومات الشخصية ─────────────────────────────────────────
                Section::make(__('admin.users.sections.personal'))
                    ->description(__('admin.users.sections.personal_description'))
                    ->icon('heroicon-o-user-circle')
                    ->schema([

                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label(__('admin.users.fields.name'))
                                ->placeholder(__('admin.users.fields.name_placeholder'))
                                ->required()
                                ->maxLength(255)
                                ->prefixIcon('heroicon-o-user'),

                            TextInput::make('email')
                                ->label(__('admin.users.fields.email'))
                                ->placeholder(__('admin.users.fields.email_placeholder'))
                                ->email()
                                ->required()
                                ->maxLength(255)
                                ->unique(ignoreRecord: true)
                                ->prefixIcon('heroicon-o-envelope'),
                        ]),

                        Select::make('roles')
                            ->label(__('admin.users.fields.roles'))
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->getOptionLabelFromRecordUsing(fn ($record) => \App\Enums\RolesEnum::tryFrom($record->name)?->label() ?? $record->name)
                            ->prefixIcon('heroicon-o-shield-check')
                            ->columnSpanFull(),

                    ])->columnSpan(2),

                // ── الأمان وكلمة المرور ───────────────────────────────────────
                Section::make(__('admin.users.sections.security'))
                    ->description(__('admin.users.sections.security_description'))
                    ->icon('heroicon-o-lock-closed')
                    ->schema([

                        TextInput::make('password')
                            ->label(__('admin.users.fields.password'))
                            ->placeholder(__('admin.users.fields.password_placeholder'))
                            ->password()
                            ->revealable()
                            ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                            ->dehydrated(fn($state) => filled($state))
                            ->required(fn(string $operation): bool => $operation === 'create')
                            ->minLength(6)
                            ->maxLength(255)
                            ->helperText(__('admin.users.fields.password_hint'))
                            ->prefixIcon('heroicon-o-key')
                            ->columnSpanFull(),

                        TextInput::make('password_confirmation')
                            ->label(__('admin.users.fields.password_confirmation'))
                            ->placeholder(__('admin.users.fields.password_placeholder'))
                            ->password()
                            ->revealable()
                            ->dehydrated(false)
                            ->same('password')
                            ->requiredWith('password')
                            ->prefixIcon('heroicon-o-key')
                            ->columnSpanFull(),

                        DateTimePicker::make('email_verified_at')
                            ->label(__('admin.users.fields.email_verified_at'))
                            ->helperText(__('admin.users.fields.email_verified_at_hint'))
                            ->nullable()
                            ->prefixIcon('heroicon-o-check-badge')
                            ->columnSpanFull(),

                    ])->columnSpan(1),

            ])
            ->columns(3);
    }
}
