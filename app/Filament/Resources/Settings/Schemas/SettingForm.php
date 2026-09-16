<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make(__('admin.settings.label'))->columnSpanFull()->schema([
             
                    Tab::make(__('admin.settings.tabs.contact'))
                        ->icon('heroicon-o-phone')
                        ->schema([
                            Grid::make(2)->schema([
                                TextInput::make('contact_email')
                                    ->label(__('admin.settings.fields.contact_email'))
                                    ->email(),
                                TextInput::make('contact_phone')
                                    ->label(__('admin.settings.fields.contact_phone')),
                                TextInput::make('contact_phone_2')
                                    ->label(__('admin.settings.fields.contact_phone_2')),
                                TextInput::make('whatsapp_number')
                                    ->label(__('admin.settings.fields.whatsapp_number')),
                                Textarea::make('contact_address')
                                    ->label(__('admin.settings.fields.contact_address'))
                                    ->columnSpanFull(),
                            ]),
                        ]),

                    Tab::make(__('admin.settings.tabs.social'))
                        ->icon('heroicon-o-share')
                        ->schema([
                            Grid::make(2)->schema([
                                TextInput::make('facebook_url')
                                    ->label(__('admin.settings.fields.facebook_url'))
                                    ->url(),
                                TextInput::make('twitter_url')
                                    ->label(__('admin.settings.fields.twitter_url'))
                                    ->url(),
                                TextInput::make('instagram_url')
                                    ->label(__('admin.settings.fields.instagram_url'))
                                    ->url(),
                                TextInput::make('linkedin_url')
                                    ->label(__('admin.settings.fields.linkedin_url'))
                                    ->url(),
                            ]),
                        ]),

                    Tab::make(__('admin.settings.tabs.seo'))
                        ->icon('heroicon-o-globe-alt')
                        ->schema([
                            Grid::make(2)->schema([
                                TextInput::make('meta_title')
                                    ->label(__('admin.settings.fields.meta_title'))
                                    ->placeholder('منصة Medvion | التدريب والتأهيل الصحي الرقمي')
                                    ->columnSpanFull(),
                                Textarea::make('meta_description')
                                    ->label(__('admin.settings.fields.meta_description'))
                                    ->rows(3)
                                    ->columnSpanFull(),
                                TextInput::make('meta_keywords')
                                    ->label(__('admin.settings.fields.meta_keywords'))
                                    ->columnSpanFull(),
                                TextInput::make('google_site_verification')
                                    ->label(__('admin.settings.fields.google_site_verification'))
                                    ->columnSpan(1),
                                TextInput::make('bing_site_verification')
                                    ->label(__('admin.settings.fields.bing_site_verification'))
                                    ->columnSpan(1),
                                FileUpload::make('og_image')
                                    ->label(__('admin.settings.fields.og_image'))
                                    ->image()
                                    ->directory('settings')
                                    ->disk('public')
                                    ->columnSpanFull(),
                            ]),
                        ]),

                ])
            ]);
    }
}
