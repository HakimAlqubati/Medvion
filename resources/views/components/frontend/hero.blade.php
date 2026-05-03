{{-- ============================================================
     Hero Section – Medvion Platform | Static Premium Medical Hero
     Responsive-first version
     ============================================================ --}}
@props([
    'slides' => []
])

@php
    $locale = app()->getLocale();
    $isRtl = $locale === 'ar';

    $firstSlide = collect($slides)->first();

    $heroImage = $firstSlide->image_url
        ?? asset('/images/hero-slide-1.png');

    $badge = $firstSlide->badge
        ?? 'Medvion';

    $headlineTop = $firstSlide->title_1
        ?? __('land.hero_static_title_1', [], $locale);

    $headlineBottom = $firstSlide->title_2
        ?? __('land.hero_static_title_2', [], $locale);

    $subtitle = $firstSlide->subtitle
        ?? __('land.hero_static_subtitle', [], $locale);

    if ($headlineTop === 'land.hero_static_title_1') {
        $headlineTop = $isRtl ? 'التدريب الصحي الرقمي' : 'Digital Healthcare Training';
    }

    if ($headlineBottom === 'land.hero_static_title_2') {
        $headlineBottom = $isRtl ? 'بمعايير مهنية موثوقة' : 'Built on Trusted Professional Standards';
    }

    if ($subtitle === 'land.hero_static_subtitle') {
        $subtitle = $isRtl
            ? 'منصة متخصصة تقدم برامج تدريبية حديثة، وتجربة تعليمية احترافية مرنة مصممة للكوادر الصحية من أي مكان.'
            : 'A specialized platform delivering modern training programs and a flexible, professional learning experience for healthcare professionals from anywhere.';
    }

    $trustItems = [
        $isRtl ? 'خبراء متخصصون' : 'Expert-Led Programs',
        $isRtl ? 'شهادات رقمية' : 'Digital Certificates',
        $isRtl ? 'تعلم مرن' : 'Flexible Learning',
        $isRtl ? 'محتوى حديث' : 'Up-to-Date Content',
    ];
@endphp

<section
    id="hero-root"
    class="relative overflow-hidden bg-[#020b18] min-h-[100svh] md:min-h-screen flex items-end md:items-center"
    dir="{{ $isRtl ? 'rtl' : 'ltr' }}"
>
    {{-- Background image --}}
    <div class="absolute inset-0 z-0">
        <img
            src="{{ $heroImage }}"
            onerror="this.onerror=null;this.src='{{ asset('/images/hero-slide-1.png') }}';"
            alt="{{ $headlineTop }}"
            loading="eager"
            fetchpriority="high"
            decoding="async"
            class="absolute inset-0 w-full h-full object-cover object-center md:object-center hero-bg-img"
        >
        <div class="absolute inset-0 hero-overlay"></div>
    </div>

    {{-- Ambient layers --}}
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <div
            class="orb absolute size-[260px] sm:size-[340px] lg:size-[520px] -top-12 sm:-top-16 lg:-top-24 {{ $isRtl ? '-right-16 sm:-right-24 lg:-right-32' : '-left-16 sm:-left-24 lg:-left-32' }} rounded-full blur-3xl bg-primary/20"
            style="animation-duration: 24s;"
        ></div>

        <div
            class="orb absolute size-[220px] sm:size-[300px] lg:size-[420px] bottom-0 {{ $isRtl ? '-left-8 sm:-left-10' : '-right-8 sm:-right-10' }} rounded-full blur-3xl bg-secondary/20"
            style="animation-duration: 28s;"
        ></div>
    </div>

    <div class="absolute inset-0 z-0 pointer-events-none hero-grid-mask"></div>

    {{-- Content --}}
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 pt-28 sm:pt-32 lg:pt-36 pb-16 sm:pb-20 lg:pb-24 md:py-0 md:min-h-screen md:flex md:items-center">
        <div class="w-full max-w-2xl lg:max-w-3xl {{ $isRtl ? 'ms-auto text-right' : 'me-auto text-left' }}">

            {{-- Badge --}}
            <div
                class="hero-enter inline-flex max-w-full items-center gap-3 mb-6 sm:mb-8 px-4 sm:px-6 lg:px-7 py-2.5 sm:py-3 rounded-full bg-white/10 border border-white/25 backdrop-blur-md shadow-[0_4px_20px_rgba(255,255,255,0.1)] transition-all duration-300 hover:bg-white/15"
                style="animation-delay:0.05s"
                dir="ltr"
            >
                <span class="relative flex h-2.5 w-2.5 sm:h-3 sm:w-3 mt-0.5 shrink-0">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-80"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 sm:h-3 sm:w-3 bg-white shadow-[0_0_12px_rgba(255,255,255,1)]"></span>
                </span>

                <span class="truncate text-sm sm:text-lg lg:text-2xl font-black tracking-[0.12em] sm:tracking-[0.18em] text-white drop-shadow-md">
                    +{{ $badge }}
                </span>
            </div>

            {{-- Headline --}}
            <h1
                class="hero-enter font-black text-white leading-[1.02] tracking-tight mb-5 sm:mb-6"
                style="animation-delay:0.15s; text-shadow: 0 4px 24px rgba(0,0,0,0.6);"
            >
                <span class="block text-[clamp(2rem,8vw,4.25rem)]">
                    {{ $headlineTop }}
                </span>

                <span
                    class="block text-[clamp(2rem,8vw,4.25rem)] text-transparent bg-clip-text bg-gradient-to-r rtl:bg-gradient-to-l from-secondary-light to-white mt-1.5 sm:mt-2"
                    style="filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));"
                >
                    {{ $headlineBottom }}
                </span>
            </h1>

            {{-- Subtitle --}}
            <p
                class="hero-enter text-sm sm:text-base lg:text-lg text-white/90 leading-7 sm:leading-8 mb-8 sm:mb-10 max-w-xl font-medium"
                style="animation-delay:0.25s; text-shadow: 0 2px 10px rgba(0,0,0,0.8);"
            >
                {{ $subtitle }}
            </p>

            {{-- CTAs --}}
            <div
                class="hero-enter flex flex-col sm:flex-row flex-wrap gap-3 sm:gap-4 mb-8 sm:mb-10 {{ $isRtl ? 'items-stretch sm:items-center sm:justify-end lg:justify-start' : 'items-stretch sm:items-center sm:justify-start' }}"
                style="animation-delay:0.35s"
            >
                <a
                    href="#courses"
                    class="group inline-flex w-full sm:w-auto justify-center items-center gap-2.5 px-6 sm:px-7 py-3.5 rounded-xl font-bold text-sm text-white bg-gradient-to-br from-primary to-primary-dark shadow-lg shadow-primary/30 hover:shadow-primary/50 hover:-translate-y-0.5 transition-all duration-300"
                >
                    <x-heroicon-o-arrow-right class="w-4 h-4 shrink-0 transition-transform duration-300 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 rtl:rotate-180" />
                    {{ __('land.hero_cta_primary') }}
                </a>

                <a
                    href="{{ url('/about') }}"
                    class="inline-flex w-full sm:w-auto justify-center items-center gap-2 px-6 sm:px-7 py-3.5 rounded-xl font-semibold text-sm text-white/90 bg-white/5 border border-white/10 backdrop-blur-md hover:bg-white/10 hover:border-white/25 hover:-translate-y-0.5 transition-all duration-300"
                >
                    {{ __('land.hero_cta_secondary') }}
                </a>
            </div>

            {{-- Trust Strip --}}
            <div
                class="hero-enter flex flex-wrap gap-2.5 sm:gap-3 {{ $isRtl ? 'justify-end sm:justify-end lg:justify-start' : 'justify-start' }}"
                style="animation-delay:0.45s"
            >
                @foreach ($trustItems as $item)
                    <div class="inline-flex max-w-full items-center gap-2 px-3 sm:px-4 py-2 rounded-full border border-white/10 bg-white/5 backdrop-blur-md text-white/85 text-xs sm:text-sm font-medium shadow-[0_6px_18px_rgba(2,12,27,0.18)]">
                        <span class="inline-flex h-2 w-2 rounded-full bg-secondary-light shadow-[0_0_10px_rgba(255,255,255,0.55)] shrink-0"></span>
                        <span class="truncate">{{ $item }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Scroll hint --}}
    <div class="hidden md:flex absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex-col items-center gap-1.5 opacity-40 pointer-events-none">
        <span class="text-white text-[9px] uppercase tracking-[0.2em]">{{ __('land.hero_scroll') }}</span>
        <div class="scroll-mouse">
            <div class="scroll-wheel"></div>
        </div>
    </div>
</section>

@push('styles')
<style>
.hero-overlay {
    background:
        linear-gradient(
            to {{ $isRtl ? 'left' : 'right' }},
            rgba(2,12,27,0.92) 0%,
            rgba(5,20,40,0.70) 42%,
            rgba(5,20,40,0.34) 72%,
            rgba(5,20,40,0.16) 100%
        ),
        linear-gradient(
            0deg,
            rgba(2,12,27,0.86) 0%,
            rgba(5,20,40,0.38) 42%,
            rgba(5,20,40,0.12) 100%
        );
}

.hero-bg-img {
    will-change: transform;
    backface-visibility: hidden;
    transform: translateZ(0);
    animation: hero-kenburns 28s ease-in-out infinite alternate;
}

.hero-grid-mask {
    background-image:
        linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px);
    background-size: 40px 40px;
    opacity: 0.1;
}

.orb {
    animation: orb-pulse 24s ease-in-out infinite alternate;
    will-change: opacity;
}

@keyframes orb-pulse {
    from { opacity: 0.4; }
    to   { opacity: 0.8; }
}

@keyframes hero-kenburns {
    0%   { transform: scale(1.0) translateZ(0); }
    100% { transform: scale(1.05) translateZ(0); }
}

.hero-enter {
    animation: hero-rise 0.75s cubic-bezier(.22,1,.36,1) both;
}

@keyframes hero-rise {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

.scroll-mouse {
    width: 20px;
    height: 32px;
    border: 1.5px solid rgba(255,255,255,0.3);
    border-radius: 11px;
    display: flex;
    justify-content: center;
    padding-top: 5px;
}

.scroll-wheel {
    width: 3px;
    height: 5px;
    background: rgba(255,255,255,0.6);
    border-radius: 3px;
    animation: scroll-anim 2s ease-in-out infinite;
    will-change: transform, opacity;
}

@keyframes scroll-anim {
    0%   { opacity: 1; transform: translateY(0); }
    70%  { opacity: 0; transform: translateY(8px); }
    100% { opacity: 0; transform: translateY(0); }
}

@media (max-width: 639px) {
    .hero-bg-img {
        animation-duration: 22s;
    }

    .hero-grid-mask {
        opacity: 0.10;
        background-size: 28px 28px;
    }

    .hero-overlay {
        background:
            linear-gradient(
                180deg,
                rgba(2,12,27,0.68) 0%,
                rgba(2,12,27,0.78) 34%,
                rgba(2,12,27,0.90) 100%
            ),
            linear-gradient(
                to {{ $isRtl ? 'left' : 'right' }},
                rgba(2,12,27,0.82) 0%,
                rgba(5,20,40,0.38) 65%,
                rgba(5,20,40,0.16) 100%
            );
    }
}

@media (prefers-reduced-motion: reduce) {
    .hero-bg-img,
    .orb,
    .scroll-wheel,
    .hero-enter,
    .animate-ping {
        animation: none !important;
        transition: none !important;
    }

    .hero-bg-img,
    .orb,
    .hero-enter {
        transform: none !important;
    }
}
</style>
@endpush
