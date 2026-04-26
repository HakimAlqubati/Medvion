<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Schemas\Schema;
 use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Section;

class BlogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.blogs.sections.content'))
                    ->schema([
                        TextEntry::make('title')
                            ->label(__('admin.blogs.fields.title')),
                        TextEntry::make('short_description')
                            ->label(__('admin.blogs.fields.short_description')),
                        TextEntry::make('content')
                            ->label(__('admin.blogs.fields.content'))
                            ->html(),
                    ]),
                Section::make(__('admin.blogs.sections.settings'))
                    ->schema([
                        ImageEntry::make('main_image')
                            ->label(__('admin.blogs.fields.main_image')),
                        TextEntry::make('status')
                            ->label(__('admin.blogs.fields.status'))
                            ->badge(),
                        TextEntry::make('read_count')
                            ->label(__('admin.blogs.fields.read_count')),
                        TextEntry::make('published_at')
                            ->label(__('admin.blogs.fields.published_at'))
                            ->dateTime(),
                    ])->columns(2),
            ]);
    }
}
