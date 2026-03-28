<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    Grid::make(2)->schema([
                        TextInput::make('title')
                            ->label(__('admin.courses.fields.title'))
                            ->required()
                            ->maxLength(255),
                        Select::make('category_id')
                            ->label(__('admin.courses.fields.category'))
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),
                    Textarea::make('brief')
                        ->label(__('admin.courses.fields.brief'))
                        ->required()
                        ->columnSpanFull(),
                    Grid::make(2)->schema([
                        TextInput::make('price')
                            ->label(__('admin.courses.fields.price'))
                            ->numeric()
                            ->prefix('$')
                            ->required(),
                        Toggle::make('is_active')
                            ->label(__('admin.courses.fields.is_active'))
                            ->default(true),
                    ]),
                    FileUpload::make('image')
                        ->label(__('admin.courses.fields.image'))
                        ->image()
                        ->directory('courses')
                        ->columnSpanFull(),
                ])->columnSpan(2),

                Section::make()->schema([
                    Repeater::make('objectives')
                        ->label(__('admin.courses.fields.objectives'))
                        ->simple(
                            TextInput::make('objective')
                                ->label(__('admin.courses.fields.objective'))
                        )
                        ->collapsible(),
                    Repeater::make('target_audience')
                        ->label(__('admin.courses.fields.target_audience'))
                        ->simple(
                            TextInput::make('audience')
                                ->label(__('admin.courses.fields.audience'))
                        )
                        ->collapsible(),
                    Repeater::make('content_modules')
                        ->label(__('admin.courses.fields.content_modules'))
                        ->schema([
                            TextInput::make('module_title')
                                ->label(__('admin.courses.fields.module_title'))
                                ->required(),
                            Textarea::make('module_description')
                                ->label(__('admin.courses.fields.module_description')),
                        ])
                        ->collapsible(),
                ])->columnSpan(1),
            ])
            ->columns(3);
    }
}
