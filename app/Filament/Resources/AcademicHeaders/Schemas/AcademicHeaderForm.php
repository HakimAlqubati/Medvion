<?php

namespace App\Filament\Resources\AcademicHeaders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AcademicHeaderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.academic_headers.sections.content'))
                    ->schema([
                        TextInput::make('title')
                            ->label(__('admin.academic_headers.fields.title'))
                            ->required()
                            ->maxLength(255),
                        Textarea::make('description')
                            ->label(__('admin.academic_headers.fields.description'))
                            ->nullable()
                            ->maxLength(1000),
                        Toggle::make('is_active')
                            ->label(__('admin.academic_headers.fields.is_active'))
                            ->default(true),
                    ]),

                Section::make(__('admin.academic_headers.sections.experts'))
                    ->schema([
                        Repeater::make('experts')
                            ->relationship('experts') // Assumes the relationship name is experts
                            ->label('')
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('admin.academic_headers.fields.name'))
                                    ->required()
                                    ->maxLength(255),
                                FileUpload::make('image')
                                    ->label(__('admin.academic_headers.fields.image'))
                                    ->image()
                                    ->directory('experts')
                                    ->imageEditor()
                                    ->nullable(),
                                TextInput::make('courses_count')
                                    ->label(__('admin.academic_headers.fields.courses_count'))
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                                TextInput::make('students_count')
                                    ->label(__('admin.academic_headers.fields.students_count'))
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->itemLabel(function (array $state): ?string {
                                $name = $state['name'] ?? null;
                                if (is_array($name)) {
                                    return $name[app()->getLocale()] ?? collect($name)->first();
                                }
                                return $name;
                            })
                            ->collapsible()
                            ->defaultItems(1),
                    ]),
            ]);
    }
}
