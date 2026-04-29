<?php

namespace App\Providers\Filament;

use App\Filament\Resources\Abouts\AboutResource;
use App\Filament\Resources\Categories\CategoryResource;
use App\Filament\Resources\ContactMessages\ContactMessageResource;
use App\Filament\Resources\Courses\CourseResource;
use App\Filament\Resources\CourseRegistrations\CourseRegistrationResource;
use App\Filament\Resources\Faqs\FaqResource;
use App\Filament\Resources\Features\FeatureResource;
use App\Filament\Resources\HeroSlides\HeroSlideResource;
use App\Filament\Resources\Goals\GoalResource;
use App\Filament\Resources\TargetAudiences\TargetAudienceResource;
use App\Filament\Resources\TeamMembers\TeamMemberResource;
use App\Filament\Resources\Impacts\ImpactResource;
use App\Filament\Resources\Pages\PageResource;
use App\Filament\Resources\Partners\PartnerResource;
use App\Filament\Resources\Surveys\SurveyResource;
use App\Filament\Resources\SurveySubmissions\SurveySubmissionResource;
use App\Filament\Resources\Users\UserResource;
use BezhanSalleh\FilamentShield\Resources\Roles\RoleResource;
use App\Filament\Pages\Auth\Login;
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
use Filament\View\PanelsRenderHook;
use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->brandName('Medvion')
            ->brandLogo(asset('favicon.png'))
            ->favicon(asset('favicon.png'))
            ->colors([
                'primary' => Color::hex('#1A52CE'),
            ])
            ->brandLogoHeight('3.0rem')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                // AccountWidget::class,
                // FilamentInfoWidget::class,
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
                                ...(CourseResource::canViewAny() ? CourseResource::getNavigationItems() : []),
                                ...(CategoryResource::canViewAny() ? CategoryResource::getNavigationItems() : []),

                            ]),

                        //     // ── تسجيلات الدورات ──────────────────────────────────────
                        NavigationGroup::make(__('admin.navigation.groups.registrations'))
                            ->items([
                                ...(CourseRegistrationResource::canViewAny() ? CourseRegistrationResource::getNavigationItems() : []),
                            ]),

                        //     // ── إدارة الموقع ──────────────────────────────────────────
                        NavigationGroup::make(__('admin.navigation.groups.site'))
                            // ->icon(Heroicon::OutlinedGlobeAlt)
                            ->items([
                                ...(HeroSlideResource::canViewAny() ? HeroSlideResource::getNavigationItems() : []),
                                ...(AboutResource::canViewAny() ? AboutResource::getNavigationItems() : []),
                                ...(GoalResource::canViewAny() ? GoalResource::getNavigationItems() : []),
                                ...(TargetAudienceResource::canViewAny() ? TargetAudienceResource::getNavigationItems() : []),
                                ...(TeamMemberResource::canViewAny() ? TeamMemberResource::getNavigationItems() : []),
                                ...(ImpactResource::canViewAny() ? ImpactResource::getNavigationItems() : []),
                                ...(PageResource::canViewAny() ? PageResource::getNavigationItems() : []),
                                ...(FeatureResource::canViewAny() ? FeatureResource::getNavigationItems() : []),
                                ...(FaqResource::canViewAny() ? FaqResource::getNavigationItems() : []),
                                ...(\App\Filament\Resources\Partners\PartnerResource::canViewAny() ? \App\Filament\Resources\Partners\PartnerResource::getNavigationItems() : []),
                                ...(\App\Filament\Resources\Testimonials\TestimonialResource::canViewAny() ? \App\Filament\Resources\Testimonials\TestimonialResource::getNavigationItems() : []),
                                ...(\App\Filament\Resources\AcademicHeaders\AcademicHeaderResource::canViewAny() ? \App\Filament\Resources\AcademicHeaders\AcademicHeaderResource::getNavigationItems() : []),
                            ]),

                        //     // ── التواصل ───────────────────────────────────────────────
                        NavigationGroup::make(__('admin.navigation.groups.communication'))
                            // ->icon(Heroicon::OutlinedChatBubbleLeftRight)
                            ->items([
                                ...(ContactMessageResource::canViewAny() ? ContactMessageResource::getNavigationItems() : []),
                            ]),
                        
                        NavigationGroup::make(__('admin.navigation.groups.surveys'))
                            ->items([
                                ...(\App\Filament\Resources\Surveys\SurveyResource::canViewAny() ? \App\Filament\Resources\Surveys\SurveyResource::getNavigationItems() : []),
                                ...(\App\Filament\Resources\SurveySubmissions\SurveySubmissionResource::canViewAny() ? \App\Filament\Resources\SurveySubmissions\SurveySubmissionResource::getNavigationItems() : []),
                            ]),

                        //     // ── المدونة ───────────────────────────────────────────────
                        NavigationGroup::make(__('admin.navigation.groups.blog'))
                            ->items([
                                ...(\App\Filament\Resources\Blogs\BlogResource::canViewAny() ? \App\Filament\Resources\Blogs\BlogResource::getNavigationItems() : []),
                            ]),

                        // ── الإدارة ───────────────────────────────────────────────
                        NavigationGroup::make(__('admin.navigation.groups.management'))
                            // ->icon(Heroicon::OutlinedCog6Tooth)
                            ->items([
                                ...(UserResource::canViewAny() ? UserResource::getNavigationItems() : []),
                                ...(RoleResource::canViewAny() ? RoleResource::getNavigationItems() : []),
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
            ->sidebarCollapsibleOnDesktop()
            ->renderHook(
                PanelsRenderHook::TOPBAR_LOGO_AFTER,
                fn(): string =>
                view('filament.partials.current-time')->render()
            )
            ->renderHook(
                PanelsRenderHook::TOPBAR_LOGO_AFTER,
                fn(): string =>
                view('filament.partials.welcome')->render()
            )

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
