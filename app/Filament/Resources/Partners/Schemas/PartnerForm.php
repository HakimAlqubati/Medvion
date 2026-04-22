<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Grid;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.partners.sections.category_info'))
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name_ar')
                                ->label(__('admin.partners.fields.name_ar'))
                                ->required()
                                ->maxLength(255),
                                
                            TextInput::make('name_en')
                                ->label(__('admin.partners.fields.name_en'))
                                ->required()
                                ->maxLength(255),
                                
                            TextInput::make('stat_value')
                                ->label(__('admin.partners.fields.stat_value'))
                                ->placeholder('e.g., +40')
                                ->maxLength(255),
                                
                            Select::make('icon')
                                ->label(__('admin.partners.fields.icon'))
                                ->options([
                                    'gov' => 'جهة حكومية (Government)',
                                    'cert' => 'هيئة اعتماد (Accreditation)',
                                    'hosp' => 'مستشفى (Hospital)',
                                    'edu' => 'جامعة أو تعليم (Education)',
                                    'tech' => 'تقنية (Technology)',
                                    'assoc' => 'رابطة أو جمعية (Association)',
                                ])
                                ->searchable()
                                ->nullable(),
                        ]),
                        
                        Toggle::make('is_active')
                            ->label(__('admin.partners.fields.is_active'))
                            ->default(true)
                            ->inline(false),
                    ]),

                Section::make(__('admin.partners.sections.children'))
                    ->schema([
                        Repeater::make('partners')
                            ->relationship('partners')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('name_ar')
                                        ->label(__('admin.partners.fields.name_ar'))
                                        ->required()
                                        ->maxLength(255),
                                        
                                    TextInput::make('name_en')
                                        ->label(__('admin.partners.fields.name_en'))
                                        ->required()
                                        ->maxLength(255),
                                        
                                    Select::make('icon')
                                        ->label(__('admin.partners.fields.icon'))
                                        ->options([
                                            'gov' => 'جهة حكومية (Government)',
                                            'cert' => 'هيئة اعتماد (Accreditation)',
                                            'hosp' => 'مستشفى (Hospital)',
                                            'edu' => 'جامعة أو تعليم (Education)',
                                            'tech' => 'تقنية (Technology)',
                                            'assoc' => 'رابطة أو جمعية (Association)',
                                        ])
                                        ->searchable()
                                        ->nullable(),
                                        
                                    Toggle::make('is_active')
                                        ->label(__('admin.partners.fields.is_active'))
                                        ->default(true)
                                        ->inline(false),
                                ]),
                            ])
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name_ar'] ?? null)
                            ->addActionLabel(__('admin.partners.sections.children'))
                            ->columns(1),
                    ])
            ]);
    }
}
