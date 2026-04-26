<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use App\Enums\TestimonialStatus;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Format;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('admin.testimonials.sections.content'))
                    ->description(__('admin.testimonials.sections.content_description'))
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->schema([
                        TextInput::make('client_name')
                            ->label(__('admin.testimonials.fields.client_name'))
                            ->placeholder(__('admin.testimonials.fields.client_name_placeholder'))
                            ->required()
                            ->maxLength(255),

                        TextInput::make('role')
                            ->label(__('admin.testimonials.fields.role'))
                            ->placeholder(__('admin.testimonials.fields.role_placeholder'))
                            ->required()
                            ->maxLength(255),

                        Textarea::make('content')
                            ->label(__('admin.testimonials.fields.content'))
                            ->placeholder(__('admin.testimonials.fields.content_placeholder'))
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columns(2)->columnSpan(2),

                Section::make(__('admin.testimonials.sections.settings'))
                    ->description(__('admin.testimonials.sections.settings_description'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        FileUpload::make('avatar_image')
                            ->label(__('admin.testimonials.fields.avatar_image'))
                            ->helperText(__('admin.testimonials.fields.avatar_image_hint'))
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['1:1'])
                            ->saveUploadedFileUsing(function (TemporaryUploadedFile $file): string {
                                $filename = 'testimonials/' . Str::uuid() . '.webp';
                                $manager = ImageManager::usingDriver(Driver::class);
                                $image = $manager->decode($file->getRealPath());
                                $image->scaleDown(width: 400); // Small size for avatar
                                $encodedImage = $image->encodeUsingFormat(Format::WEBP, quality: 80);
                                Storage::disk('public')->put($filename, (string) $encodedImage);
                                return $filename;
                            })
                            ->columnSpanFull(),

                        Select::make('rating')
                            ->label(__('admin.testimonials.fields.rating'))
                            ->helperText(__('admin.testimonials.fields.rating_hint'))
                            ->options([
                                5 => '⭐⭐⭐⭐⭐ (5)',
                                4 => '⭐⭐⭐⭐ (4)',
                                3 => '⭐⭐⭐ (3)',
                                2 => '⭐⭐ (2)',
                                1 => '⭐ (1)',
                            ])
                            ->default(5)
                            ->required()
                            ->columnSpanFull(),

                        Select::make('status')
                            ->label(__('admin.testimonials.fields.status'))
                            ->options(TestimonialStatus::class)
                            ->default(TestimonialStatus::ACTIVE)
                            ->required()
                            ->columnSpanFull(),
                    ])->columnSpan(1),
            ])
            ->columns(3);
    }
}
