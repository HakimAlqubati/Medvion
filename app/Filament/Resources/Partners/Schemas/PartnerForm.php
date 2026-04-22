<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Grid;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category Information')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name_ar')
                                ->label('Name (Arabic)')
                                ->required()
                                ->maxLength(255),
                                
                            TextInput::make('name_en')
                                ->label('Name (English)')
                                ->required()
                                ->maxLength(255),
                                
                            TextInput::make('stat_value')
                                ->label('Statistic Value')
                                ->placeholder('e.g., +40')
                                ->maxLength(255),
                                
                            TextInput::make('icon')
                                ->label('Icon Identifier')
                                ->placeholder('e.g., gov, cert, hosp')
                                ->maxLength(255),
                        ]),
                        
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->inline(false),
                    ]),

                Section::make('Partners (Children)')
                    ->schema([
                        Repeater::make('partners')
                            ->relationship('partners')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('name_ar')
                                        ->label('Partner Name (Arabic)')
                                        ->required()
                                        ->maxLength(255),
                                        
                                    TextInput::make('name_en')
                                        ->label('Partner Name (English)')
                                        ->required()
                                        ->maxLength(255),
                                        
                                    TextInput::make('icon')
                                        ->label('Icon Identifier')
                                        ->placeholder('e.g., gov, cert')
                                        ->maxLength(255),
                                        
                                    Toggle::make('is_active')
                                        ->label('Active')
                                        ->default(true)
                                        ->inline(false),
                                ]),
                            ])
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name_ar'] ?? null)
                            ->addActionLabel('Add Partner')
                            ->columns(1),
                    ])
            ]);
    }
}
