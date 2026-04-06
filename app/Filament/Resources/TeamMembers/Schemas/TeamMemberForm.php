<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use App\Models\TeamMember;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.abouts.sections.content'))
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextInput::make('name')
                            ->label(__('admin.team_members.fields.name'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('role')
                            ->label(__('admin.team_members.fields.role'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('bio')
                            ->label(__('admin.team_members.fields.bio'))
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columnSpan(2),

                Section::make(__('admin.abouts.sections.settings'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        FileUpload::make('image')
                            ->label(__('admin.team_members.fields.image'))
                            ->image()
                            ->disk('public')
                            ->directory('team-members')
                            ->columnSpanFull(),

                        TextInput::make('sort_order')
                            ->label(__('admin.sort_order'))
                            ->numeric()
                            ->default(function () {
                                $last = TeamMember::orderBy('sort_order', 'desc')->first();
                                return $last ? $last->sort_order + 1 : 0;
                            })
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label(__('admin.is_active'))
                            ->default(true)
                            ->columnSpanFull(),
                    ])->columnSpan(1),
            ])
            ->columns(3);
    }
}
