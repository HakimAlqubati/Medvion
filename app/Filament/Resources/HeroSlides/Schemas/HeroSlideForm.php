<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── القسم الرئيسي: المحتوى النصي ──────────────────────────────
                Section::make(__('admin.hero_slides.sections.content'))
                    ->description(__('admin.hero_slides.sections.content_description'))
                    ->icon('heroicon-o-document-text')
                    ->schema([

                        // الشارة (Badge)
                        TextInput::make('badge')
                            ->label(__('admin.hero_slides.fields.badge'))
                            ->placeholder(__('admin.hero_slides.fields.badge_placeholder'))
                            ->maxLength(100)
                            ->columnSpanFull(),

                        // العنوان الرئيسي والفرعي
                        Grid::make(2)->schema([
                            TextInput::make('title_1')
                                ->label(__('admin.hero_slides.fields.title_1'))
                                ->placeholder(__('admin.hero_slides.fields.title_1_placeholder'))
                                ->required()
                                ->maxLength(255),

                            TextInput::make('title_2')
                                ->label(__('admin.hero_slides.fields.title_2'))
                                ->placeholder(__('admin.hero_slides.fields.title_2_placeholder'))
                                ->maxLength(255),
                        ]),

                        // الوصف
                        Textarea::make('subtitle')
                            ->label(__('admin.hero_slides.fields.subtitle'))
                            ->placeholder(__('admin.hero_slides.fields.subtitle_placeholder'))
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),

                    ])->columnSpan(2),

                // ── القسم الجانبي: الإعدادات ──────────────────────────────────
                Section::make(__('admin.hero_slides.sections.settings'))
                    ->description(__('admin.hero_slides.sections.settings_description'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([

                        // الصورة
                        FileUpload::make('image')
                            ->label(__('admin.hero_slides.fields.image'))
                            ->helperText(__('admin.hero_slides.fields.image_hint'))
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['16:9', '21:9'])
                            ->directory('hero-slides')
                            ->maxSize(5120)
                            ->columnSpanFull(),

                        // الترتيب
                        TextInput::make('sort_order')
                            ->label(__('admin.hero_slides.fields.sort_order'))
                            ->helperText(__('admin.hero_slides.fields.sort_order_hint'))
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->columnSpanFull(),

                        // الحالة
                        Toggle::make('is_active')
                            ->label(__('admin.hero_slides.fields.is_active'))
                            ->helperText(__('admin.hero_slides.fields.is_active_hint'))
                            ->default(true)
                            ->columnSpanFull(),

                    ])->columnSpan(1),

            ])
            ->columns(3);
    }
}
