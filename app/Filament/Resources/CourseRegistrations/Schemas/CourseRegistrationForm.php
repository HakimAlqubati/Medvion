<?php

namespace App\Filament\Resources\CourseRegistrations\Schemas;

use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CourseRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Grid::make(2)->schema([
                            \Filament\Forms\Components\Select::make('course_id')
                                ->label(__('admin.course_registrations.fields.course'))
                                ->relationship('course', 'title')
                                ->searchable()
                                ->preload()
                                ->required(),
                            \Filament\Forms\Components\Select::make('status')
                                ->label(__('admin.course_registrations.fields.status'))
                                ->options([
                                    'pending' => __('admin.course_registrations.status.pending'),
                                    'contacted' => __('admin.course_registrations.status.contacted'),
                                    'confirmed' => __('admin.course_registrations.status.confirmed'),
                                ])
                                ->default('pending')
                                ->required(),
                        ]),
                    ]),

                Section::make()
                    ->schema([
                        Grid::make(2)->schema([
                            \Filament\Forms\Components\TextInput::make('full_name')
                                ->label(__('admin.course_registrations.fields.full_name'))
                                ->required()
                                ->maxLength(255),
                            \Filament\Forms\Components\TextInput::make('email')
                                ->label(__('admin.course_registrations.fields.email'))
                                ->email()
                                ->required()
                                ->maxLength(255),
                            \Filament\Forms\Components\TextInput::make('phone')
                                ->label(__('admin.course_registrations.fields.phone'))
                                ->tel()
                                ->required()
                                ->maxLength(50),
                            \Filament\Forms\Components\TextInput::make('profession')
                                ->label(__('admin.course_registrations.fields.profession'))
                                ->maxLength(255),
                            \Filament\Forms\Components\TextInput::make('workplace')
                                ->label(__('admin.course_registrations.fields.workplace'))
                                ->maxLength(255)
                                ->columnSpanFull(),
                        ]),
                    ]),
                
                Section::make()
                    ->schema([
                        \Filament\Forms\Components\Textarea::make('notes')
                            ->label(__('admin.course_registrations.fields.notes'))
                            ->rows(3)
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Textarea::make('admin_notes')
                            ->label(__('admin.course_registrations.fields.admin_notes'))
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
