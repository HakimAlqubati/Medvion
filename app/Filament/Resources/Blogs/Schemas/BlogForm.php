<?php

namespace App\Filament\Resources\Blogs\Schemas;

use App\Enums\BlogStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Format;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.blogs.sections.content'))
                    ->description(__('admin.blogs.sections.content_description'))
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextInput::make('title')
                            ->label(__('admin.blogs.fields.title'))
                            ->placeholder(__('admin.blogs.fields.title_placeholder'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('short_description')
                            ->label(__('admin.blogs.fields.short_description'))
                            ->placeholder(__('admin.blogs.fields.short_description_placeholder'))
                            ->rows(3)
                            ->required()
                            ->maxLength(500)
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label(__('admin.blogs.fields.content'))
                            ->placeholder(__('admin.blogs.fields.content_placeholder'))
                            ->required()
                            ->columnSpanFull(),
                    ])->columnSpan(2),

                Section::make(__('admin.blogs.sections.settings'))
                    ->description(__('admin.blogs.sections.settings_description'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        FileUpload::make('main_image')
                            ->label(__('admin.blogs.fields.main_image'))
                            ->helperText(__('admin.blogs.fields.main_image_hint'))
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['16:9', '4:3'])
                            ->saveUploadedFileUsing(function (TemporaryUploadedFile $file): string {
                                $filename = 'blogs/' . Str::uuid() . '.webp';
                                $manager = ImageManager::usingDriver(Driver::class);
                                $image = $manager->decode($file->getRealPath());
                                $image->scaleDown(width: 1200);
                                $encodedImage = $image->encodeUsingFormat(Format::WEBP, quality: 80);
                                Storage::disk('public')->put($filename, (string) $encodedImage);
                                return $filename;
                            })
                            ->columnSpanFull(),

                        Select::make('status')
                            ->label(__('admin.blogs.fields.status'))
                            ->options(BlogStatus::class)
                            ->default(BlogStatus::DRAFT)
                            ->required()
                            ->columnSpanFull(),

                        DateTimePicker::make('published_at')
                            ->label(__('admin.blogs.fields.published_at'))
                            ->columnSpanFull(),

                    ])->columnSpan(1),
            ])
            ->columns(3);
    }
}
