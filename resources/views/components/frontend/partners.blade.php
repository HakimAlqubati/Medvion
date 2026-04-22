@props(['altBg' => false])

@php
$partners = [
    ['name' => 'وزارة الصحة', 'name_en' => 'Ministry of Health',       'type' => __('land.partners_type_gov'),    'icon' => 'gov'],
    ['name' => 'هيئة التخصصات', 'name_en' => 'Saudi Commission',       'type' => __('land.partners_type_accred'), 'icon' => 'cert'],
    ['name' => 'مستشفى الملك فهد', 'name_en' => 'King Fahad Hospital', 'type' => __('land.partners_type_hosp'),   'icon' => 'hosp'],
    ['name' => 'جامعة الملك سعود', 'name_en' => 'King Saud University', 'type' => __('land.partners_type_edu'),   'icon' => 'edu'],
    ['name' => 'المجلس الصحي', 'name_en' => 'Health Council',          'type' => __('land.partners_type_gov'),    'icon' => 'gov'],
    ['name' => 'كلية الطب', 'name_en' => 'College of Medicine',        'type' => __('land.partners_type_edu'),    'icon' => 'edu'],
    ['name' => 'مركز الابتكار', 'name_en' => 'Innovation Center',      'type' => __('land.partners_type_tech'),   'icon' => 'tech'],
    ['name' => 'رابطة الممارسين', 'name_en' => 'Practitioners Union',  'type' => __('land.partners_type_assoc'),  'icon' => 'assoc'],
];
$locale = app()->getLocale();
$isAr   = $locale === 'ar';

$icons = [
    'gov'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>',
    'cert'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>',
    'hosp'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z"/>',
    'edu'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>',
    'tech'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25zm.75-12h9v9h-9v-9z"/>',
    'assoc' => '<path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>',
];

$colors = [
    'gov'   => ['bg' => 'bg-blue-50',    'icon' => 'text-blue-600',   'border' => 'border-blue-100'],
    'cert'  => ['bg' => 'bg-emerald-50', 'icon' => 'text-emerald-600','border' => 'border-emerald-100'],
    'hosp'  => ['bg' => 'bg-red-50',     'icon' => 'text-red-500',    'border' => 'border-red-100'],
    'edu'   => ['bg' => 'bg-violet-50',  'icon' => 'text-violet-600', 'border' => 'border-violet-100'],
    'tech'  => ['bg' => 'bg-cyan-50',    'icon' => 'text-cyan-600',   'border' => 'border-cyan-100'],
    'assoc' => ['bg' => 'bg-amber-50',   'icon' => 'text-amber-600',  'border' => 'border-amber-100'],
];


@endphp

<section class="py-24 bg-white relative overflow-hidden" id="partners" aria-label="{{ __('land.partners_section_label') }}">

    {{-- Subtle grid background --}}
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
        <div class="absolute inset-0"
             style="background-image: radial-gradient(circle, rgba(0,102,153,0.04) 1px, transparent 1px); background-size: 32px 32px;"></div>
        {{-- Ambient blobs --}}
        <div class="absolute -top-32 -start-32 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -end-32 w-96 h-96 bg-secondary/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- ── Section Header ── --}}
        <div class="text-center mb-16 reveal">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2.5 px-5 py-2 rounded-full bg-primary/8 border border-primary/15 text-primary mb-6 shadow-sm">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
                </span>
                <span class="text-xs font-black uppercase tracking-[0.25em]">{{ __('land.partners_badge') }}</span>
            </div>

            <h2 class="text-4xl sm:text-5xl font-black text-gray-900 leading-tight mb-5">
                {{ __('land.partners_title_1') }}
                <span class="relative inline-block">
                    <span class="relative z-10 text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">{{ __('land.partners_title_highlight') }}</span>
                    <span class="absolute inset-x-0 -bottom-1 h-[3px] bg-gradient-to-r from-primary to-secondary rounded-full opacity-30"></span>
                </span>
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto leading-relaxed">
                {{ __('land.partners_subtitle') }}
            </p>
        </div>

        {{-- ── Stats Strip ── --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-16 reveal delay-100">
            @foreach([
                ['val' => '+40',  'label' => __('land.partners_stat_partners')],
                ['val' => '+12',  'label' => __('land.partners_stat_accred')],
                ['val' => '+8',   'label' => __('land.partners_stat_hospitals')],
                ['val' => '+5',   'label' => __('land.partners_stat_universities')],
            ] as $stat)
            <div class="group relative text-center p-6 rounded-2xl bg-gradient-to-br from-gray-50 to-white border border-gray-100 hover:border-primary/20 hover:shadow-lg hover:shadow-primary/5 transition-all duration-300 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-primary/0 to-primary/0 group-hover:from-primary/3 group-hover:to-secondary/3 transition-all duration-500"></div>
                <div class="relative z-10">
                    <div class="text-3xl sm:text-4xl font-black text-primary mb-1 tabular-nums">{{ $stat['val'] }}</div>
                    <div class="text-xs sm:text-sm text-gray-500 font-semibold">{{ $stat['label'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- ── Seamless Infinite Marquee ── --}}
        <div class="relative mb-16 reveal delay-200">

            {{-- Edge fade masks --}}
            <div class="absolute inset-y-0 start-0 w-24 sm:w-32 z-10 pointer-events-none bg-gradient-to-r rtl:bg-gradient-to-l from-white to-transparent"></div>
            <div class="absolute inset-y-0 end-0 w-24 sm:w-32 z-10 pointer-events-none bg-gradient-to-l rtl:bg-gradient-to-r from-white to-transparent"></div>

            <div class="flex flex-col gap-6 overflow-hidden">
                
                {{-- Track 1 --}}
                <div class="flex w-max group">
                    <div class="flex shrink-0 animate-marquee-1">
                        @foreach($partners as $p)
                        @php $c = $colors[$p['icon']]; @endphp
                        <div class="pe-6">
                            <div class="partner-card relative flex items-center gap-4 px-6 py-4 rounded-2xl bg-white border border-gray-100 w-[250px] shrink-0 cursor-default select-none">
                                <div class="w-12 h-12 rounded-xl {{ $c['bg'] }} border {{ $c['border'] }} flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 {{ $c['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        {!! $icons[$p['icon']] !!}
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="font-bold text-gray-800 text-[15px] truncate">{{ $isAr ? $p['name'] : $p['name_en'] }}</p>
                                    <p class="text-[12px] text-gray-400 mt-0.5 font-medium">{{ $p['type'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex shrink-0 animate-marquee-1" aria-hidden="true">
                        @foreach($partners as $p)
                        @php $c = $colors[$p['icon']]; @endphp
                        <div class="pe-6">
                            <div class="partner-card relative flex items-center gap-4 px-6 py-4 rounded-2xl bg-white border border-gray-100 w-[250px] shrink-0 cursor-default select-none">
                                <div class="w-12 h-12 rounded-xl {{ $c['bg'] }} border {{ $c['border'] }} flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 {{ $c['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        {!! $icons[$p['icon']] !!}
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="font-bold text-gray-800 text-[15px] truncate">{{ $isAr ? $p['name'] : $p['name_en'] }}</p>
                                    <p class="text-[12px] text-gray-400 mt-0.5 font-medium">{{ $p['type'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>

        {{-- ── CTA ── --}}
        <div class="mt-8 text-center reveal">
            <p class="text-gray-500 text-sm mb-4 font-medium">{{ __('land.partners_cta_text') }}</p>
            <a href="{{ route('contact') }}"
               class="group inline-flex items-center gap-2.5 px-8 py-3.5 rounded-xl bg-primary text-white font-bold text-sm shadow-md shadow-primary/20 hover:bg-primary-dark hover:-translate-y-0.5 hover:shadow-lg hover:shadow-primary/30 transition-all duration-300">
                {{ __('land.partners_cta_btn') }}
                <svg class="w-4 h-4 rtl:rotate-180 transition-transform duration-300 group-hover:translate-x-1 rtl:group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

    </div>
</section>

@push('styles')
<style>
    /* 
       Hardware Accelerated Infinite Marquee 
       - will-change: transform tells the browser to offload animation to the GPU.
       - translateZ(0) forces hardware acceleration (compositing layer).
       This ensures 0 CPU usage and perfectly smooth 60fps scrolling.
    */
    .animate-marquee-1 {
        will-change: transform;
        transform: translateZ(0);
        animation: marquee-scroll 35s linear infinite;
    }

    /* Pause both tracks together when the parent group is hovered */
    .group:hover .animate-marquee-1 {
        animation-play-state: paused;
    }

    /* 
       Focus Effect (Spotlight):
       When the user hovers over the track (.group), dim all cards.
       Then, restore the opacity and scale up ONLY the card being hovered.
    */
    .partner-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform, filter, opacity;
    }

    .group:hover .partner-card {
        filter: grayscale(100%);
        opacity: 0.35;
        transform: scale(0.96);
    }

    .group .partner-card:hover {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.06);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        z-index: 10;
        border-color: #e5e7eb; /* Keep a clean border or use var(--primary) */
    }

    /* Standard LTR */
    @keyframes marquee-scroll {
        from { transform: translateX(0); }
        to   { transform: translateX(-100%); }
    }

    /* RTL Override */
    html[dir="rtl"] .animate-marquee-1 {
        animation-name: marquee-scroll-rtl;
    }

    @keyframes marquee-scroll-rtl {
        from { transform: translateX(0); }
        to   { transform: translateX(100%); }
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
        .animate-marquee-1 {
            animation: none;
        }
    }
</style>
@endpush
