<?php

namespace App\Providers\Filament;

use App\Filament\Resources\Abouts\AboutResource;
use App\Filament\Resources\Categories\CategoryResource;
use App\Filament\Resources\ContactMessages\ContactMessageResource;
use App\Filament\Resources\Courses\CourseResource;
use App\Filament\Resources\Faqs\FaqResource;
use App\Filament\Resources\Features\FeatureResource;
use App\Filament\Resources\HeroSlides\HeroSlideResource;
use App\Filament\Resources\Pages\PageResource;
use App\Filament\Resources\Users\UserResource;
use BezhanSalleh\FilamentShield\Resources\Roles\RoleResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Medvion')
            ->brandLogo(asset('favicon.png'))
            ->favicon(asset('favicon.png'))
            ->colors([
                'primary' => Color::hex('#1A52CE'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder
                    ->items([
                        NavigationItem::make(__('admin.navigation.dashboard'))
                            ->icon(Heroicon::OutlinedHome)
                            ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.dashboard'))
                            ->url(fn(): string => Dashboard::getUrl()),
                    ])
                    ->groups([

                        //     // ── المحتوى الرئيسي ──────────────────────────────────────
                        NavigationGroup::make(__('admin.navigation.groups.content'))
                            // ->icon(Heroicon::OutlinedRectangleStack)
                            ->items([
                                ...CourseResource::getNavigationItems(),
                                ...CategoryResource::getNavigationItems(),

                            ]),

                        //     // ── إدارة الموقع ──────────────────────────────────────────
                        NavigationGroup::make(__('admin.navigation.groups.site'))
                            // ->icon(Heroicon::OutlinedGlobeAlt)
                            ->items([
                                ...HeroSlideResource::getNavigationItems(),
                                ...AboutResource::getNavigationItems(),
                                ...PageResource::getNavigationItems(),
                                ...FeatureResource::getNavigationItems(),
                                ...FaqResource::getNavigationItems(),
                            ]),

                        //     // ── التواصل ───────────────────────────────────────────────
                        NavigationGroup::make(__('admin.navigation.groups.communication'))
                            // ->icon(Heroicon::OutlinedChatBubbleLeftRight)
                            ->items([
                                ...ContactMessageResource::getNavigationItems(),
                            ]),

                        // ── الإدارة ───────────────────────────────────────────────
                        NavigationGroup::make(__('admin.navigation.groups.management'))
                            // ->icon(Heroicon::OutlinedCog6Tooth)
                            ->items([
                                ...UserResource::getNavigationItems(),
                                ...RoleResource::getNavigationItems(),
                            ]),
                    ])
                ;
            })
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->spa()
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(
                SpatieTranslatablePlugin::make()
                    ->persist()
                    ->defaultLocales(['ar', 'en']),
            )
            ->plugin(
                FilamentShieldPlugin::make(),
            )
        ;
    }
}
