{{-- ============================================================
     Hero Section – Medvion Platform | Medical Trust Theme
     ============================================================ --}}
@props([
    'slides' => [] // Expected to be passed from the controller or parent view
])

<section id="hero-root"
    class="relative overflow-hidden min-h-screen flex items-end pb-20 md:items-center md:pb-0 bg-[#020b18]"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
>

    {{-- ══════════════════════════════════════════
         SLIDE IMAGES – Stacked, Crossfade with Lazy/Eager Load
    ══════════════════════════════════════════ --}}
    <div id="hero-slides" class="absolute inset-0 z-0">
        @foreach ($slides as $i => $slide)
        <div
            class="hero-slide absolute inset-0 transition-opacity duration-[1400ms] ease-in-out {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
            data-index="{{ $i }}"
        >
            {{-- Image optimization: Eager load first slide, lazy load the rest --}}
            <img
                src="{{ $slide->image_url }}"
                onerror="this.onerror=null;this.src='{{ asset('/images/hero-slide-1.png') }}';"
                alt="{{ $slide->title_1 }}"
                loading="{{ $i === 0 ? 'eager' : 'lazy' }}"
                decoding="async"
                class="absolute inset-0 w-full h-full object-cover hero-slide-img"
                style="animation: kenburns-{{ $i }} {{ 14 + $i * 2 }}s ease-in-out infinite alternate;"
            >

            {{-- Gradient overlay: Medical dark blue/navy + left vignette + bottom fade --}}
            <div class="absolute inset-0 hero-overlay"></div>
        </div>
        @endforeach
    </div>

    {{-- ══════════════════════════════════════════
         FLOATING ORBS - Medical Trust Colors (Teal/Blue)
    ══════════════════════════════════════════ --}}
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="orb absolute w-[500px] h-[500px] -top-20 -start-32 rounded-full blur-3xl bg-primary/20" style="animation-duration: 14s;"></div>
        <div class="orb absolute w-[400px] h-[400px] bottom-0 end-0 rounded-full blur-3xl bg-secondary/20" style="animation-duration: 18s;"></div>
    </div>

    {{-- ══════════════════════════════════════════
         CONTENT
    ══════════════════════════════════════════ --}}
    <div class="relative z-10 w-full max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-36 pb-24 md:py-0 md:min-h-screen md:flex md:items-center">

        <div class="max-w-2xl lg:max-w-3xl {{ app()->getLocale() === 'ar' ? 'ms-auto text-right' : 'me-auto text-left' }}">

            {{-- Badge --}}
            @if(count($slides) > 0)
            <div id="hero-badge" class="hero-enter inline-flex items-center gap-2 mb-7 px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md" style="animation-delay:0.05s">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                </span>
                <span id="slide-badge" class="text-xs font-bold uppercase tracking-[0.18em] text-white">
                    {{ $slides[0]->badge ?? '' }}
                </span>
            </div>

            {{-- Headline --}}
            <h1 class="hero-enter font-black text-white leading-[1.06] tracking-tight mb-6" style="animation-delay:0.15s; text-shadow: 0 4px 24px rgba(0,0,0,0.6);">
                <span id="slide-title-1" class="block text-4xl sm:text-5xl xl:text-6xl slide-text-fade">
                    {{ $slides[0]->title_1 ?? '' }}
                </span>
                <span id="slide-title-2" class="block text-4xl sm:text-5xl xl:text-6xl text-transparent bg-clip-text bg-gradient-to-r rtl:bg-gradient-to-l from-secondary-light to-white slide-text-fade mt-1" style="filter: drop-shadow(0 4px 12px rgba(0,0,0,0.8));">
                    {{ $slides[0]->title_2 ?? '' }}
                </span>
            </h1>

            {{-- Subtitle --}}
            <p id="slide-subtitle" class="hero-enter text-base sm:text-lg text-white/90 leading-relaxed mb-10 max-w-xl slide-text-fade font-medium" style="animation-delay:0.25s; text-shadow: 0 2px 10px rgba(0,0,0,0.8);">
                {{ $slides[0]->subtitle ?? '' }}
            </p>
            @endif

            {{-- CTAs --}}
            <div class="hero-enter flex flex-wrap gap-4 mb-16 {{ app()->getLocale() === 'ar' ? 'justify-end sm:justify-start' : 'justify-start' }}" style="animation-delay:0.35s">
                <a href="#courses" class="group inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl font-bold text-sm text-white bg-gradient-to-br from-primary to-primary-dark shadow-lg shadow-primary/30 hover:shadow-primary/50 hover:-translate-y-0.5 transition-all duration-300">
                    <x-heroicon-o-arrow-right class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 rtl:rotate-180" />
                    {{ __('land.hero_cta_primary') }}
                </a>
                <a href="{{ url('/about') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-sm text-white/90 bg-white/5 border border-white/10 backdrop-blur-md hover:bg-white/10 hover:border-white/25 hover:-translate-y-0.5 transition-all duration-300">
                    {{ __('land.hero_cta_secondary') }}
                </a>
            </div>

            {{-- ── Slide indicators (dots + progress line) ── --}}
            @if(count($slides) > 1)
            <div class="hero-enter flex items-center gap-5 {{ app()->getLocale() === 'ar' ? 'justify-end sm:justify-start' : 'justify-start' }}" style="animation-delay:0.45s">

                {{-- Dot + label per slide --}}
                <div class="flex items-center gap-3">
                    @foreach ($slides as $i => $slide)
                    <button
                        class="hero-dot-btn group flex items-center gap-2 cursor-pointer focus:outline-none"
                        data-slide="{{ $i }}"
                        aria-label="Slide {{ $i + 1 }}"
                    >
                        <span class="hero-dot flex-shrink-0 h-1.5 rounded-full transition-all duration-300 {{ $i === 0 ? 'w-6 bg-primary shadow-[0_0_8px] shadow-primary/50' : 'w-1.5 bg-white/25' }}"></span>
                    </button>
                    @endforeach
                </div>

                {{-- Progress bar --}}
                <div class="flex-1 max-w-[160px] h-0.5 bg-white/10 rounded-full overflow-hidden">
                    <div id="hero-progress" class="h-full bg-gradient-to-r from-primary-light to-primary-dark rounded-full {{ app()->getLocale() === 'ar' ? 'h-r-progress' : '' }}" style="width:0%"></div>
                </div>

                {{-- Counter --}}
                <span class="text-white/40 text-xs font-bold tracking-widest tabular-nums">
                    <span id="hero-counter">01</span> / 0{{ count($slides) }}
                </span>
            </div>
            @endif

        </div>
    </div>

    {{-- Scroll hint --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-1.5 opacity-40 pointer-events-none">
        <span class="text-white text-[9px] uppercase tracking-[0.2em]">{{ __('land.hero_scroll') }}</span>
        <div class="scroll-mouse"><div class="scroll-wheel"></div></div>
    </div>

</section>

@push('styles')
<style>
/* ── Slide overlays (Medical Theme: Navy/Blue base) ── */
.hero-overlay {
    background:
        linear-gradient(to {{ app()->getLocale() === 'ar' ? 'left' : 'right' }}, rgba(2,12,27,0.85) 0%, rgba(5,20,40,0.5) 55%, transparent 100%),
        linear-gradient(0deg,   rgba(2,12,27,0.7) 0%, rgba(5,20,40,0.2) 40%, transparent 100%);
}

/* ── Orbs (Trust/Medical Colors: Sky Blue & Deep Azure) ── */
.orb { animation: orb-pulse 16s ease-in-out infinite alternate; }
@keyframes orb-pulse {
    from { transform: scale(1) translate(0,0); opacity: 0.6; }
    to   { transform: scale(1.15) translate(20px,-15px); opacity: 1; }
}

/* ── Ken Burns per slide ── */
@keyframes kenburns-0 {
    0%   { transform: scale(1.00) translate(0%,   0%); }
    50%  { transform: scale(1.06) translate(-1%,  0.5%); }
    100% { transform: scale(1.03) translate(1%, -0.5%); }
}
@keyframes kenburns-1 {
    0%   { transform: scale(1.04) translate(0.5%, 0%); }
    50%  { transform: scale(1.00) translate(-0.5%, -1%); }
    100% { transform: scale(1.06) translate(0%, 0.5%); }
}
@keyframes kenburns-2 {
    0%   { transform: scale(1.02) translate(-0.5%, 0.5%); }
    50%  { transform: scale(1.06) translate(0.5%, -0.5%); }
    100% { transform: scale(1.00) translate(0%, 0%); }
}

/* ── Custom Utility Adjustments ── */

/* RTL Progress Bar adjustment */
html[dir="rtl"] .h-r-progress { float: right; }

/* ── Text crossfade ── */
.slide-text-fade { transition: opacity 0.5s ease, transform 0.5s ease; }
.slide-text-fade.fading { opacity: 0; transform: translateY(8px); }

/* ── Entry animations ── */
.hero-enter { animation: hero-rise 0.75s cubic-bezier(.22,1,.36,1) both; }
@keyframes hero-rise {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Scroll mouse ── */
.scroll-mouse { width: 20px; height: 32px; border: 1.5px solid rgba(255,255,255,0.3); border-radius: 11px; display: flex; justify-content: center; padding-top: 5px; }
.scroll-wheel  { width: 3px; height: 5px; background: rgba(255,255,255,0.6); border-radius: 3px; animation: scroll-anim 2s ease-in-out infinite; }
@keyframes scroll-anim {
    0%   { opacity:1; transform: translateY(0); }
    70%  { opacity:0; transform: translateY(8px); }
    100% { opacity:0; transform: translateY(0); }
}
</style>
@endpush

@push('scripts')
{{-- ============================================================
     SLIDER SCRIPT
     ============================================================ --}}
@if(count($slides) > 1)
<script>
document.addEventListener('DOMContentLoaded', function () {
    var TOTAL        = {{ count($slides) }};
    var INTERVAL_MS  = 6000;
    var TICK         = 50;
    var current      = 0;
    var progTimer    = null;
    var progVal      = 0;
    var paused       = false;

    var slideEls   = document.querySelectorAll('.hero-slide');
    var dotEls     = document.querySelectorAll('.hero-dot');
    var dotBtns    = document.querySelectorAll('.hero-dot-btn');
    var progressEl = document.getElementById('hero-progress');
    var counterEl  = document.getElementById('hero-counter');
    var title1El   = document.getElementById('slide-title-1');
    var title2El   = document.getElementById('slide-title-2');
    var subtitleEl = document.getElementById('slide-subtitle');
    var badgeSpan  = document.getElementById('slide-badge');

    var texts = [
        @foreach ($slides as $i => $slide)
        { badge: {!! json_encode($slide->badge ?? '') !!}, title1: {!! json_encode($slide->title_1 ?? '') !!}, title2: {!! json_encode($slide->title_2 ?? '') !!}, subtitle: {!! json_encode($slide->subtitle ?? '') !!} },
        @endforeach
    ];

    // Init: force inline opacity so Tailwind classes don't interfere
    slideEls.forEach(function (el, i) {
        el.style.transition = 'opacity 1.4s ease-in-out';
        el.style.opacity    = (i === 0) ? '1' : '0';
        el.classList.remove('opacity-100', 'opacity-0');
    });

    function goTo(index) {
        if (index === current) return;
        
        var elsToFade = [title1El, title2El, subtitleEl].filter(Boolean);
        elsToFade.forEach(function(el){ el.classList.add('fading'); });
        
        slideEls[current].style.opacity = '0';
        current = index;
        slideEls[current].style.opacity = '1';
        
        dotEls.forEach(function(d){ 
            d.classList.remove('w-6', 'bg-primary', 'shadow-[0_0_8px]', 'shadow-primary/50');
            d.classList.add('w-1.5', 'bg-white/25');
        });
        if(dotEls[current]) {
            dotEls[current].classList.remove('w-1.5', 'bg-white/25');
            dotEls[current].classList.add('w-6', 'bg-primary', 'shadow-[0_0_8px]', 'shadow-primary/50');
        }
        
        if(counterEl) counterEl.textContent = String(current + 1).padStart(2, '0');
        
        setTimeout(function () {
            if (badgeSpan && texts[current].badge) badgeSpan.textContent = texts[current].badge;
            if (title1El) title1El.textContent   = texts[current].title1;
            if (title2El) title2El.textContent   = texts[current].title2;
            if (subtitleEl) subtitleEl.textContent = texts[current].subtitle;
            
            elsToFade.forEach(function(el){ el.classList.remove('fading'); });
        }, 350);
    }

    function resetProgress() {
        clearInterval(progTimer);
        progVal = 0;
        if(progressEl) progressEl.style.width = '0%';
    }

    function startProgress() {
        if (paused) return;
        resetProgress();
        var step = (TICK / INTERVAL_MS) * 100;
        progTimer = setInterval(function () {
            if (paused) return;
            progVal = Math.min(progVal + step, 100);
            if(progressEl) progressEl.style.width = progVal + '%';
            if (progVal >= 100) {
                clearInterval(progTimer);
                goTo((current + 1) % TOTAL);
                setTimeout(startProgress, 50);
            }
        }, TICK);
    }

    dotBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var idx = parseInt(btn.getAttribute('data-slide'));
            goTo(idx);
            resetProgress();
            setTimeout(startProgress, 50);
        });
    });

    var root = document.getElementById('hero-root');
    if (root) {
        root.addEventListener('mouseenter', function () { paused = true; clearInterval(progTimer); });
        root.addEventListener('mouseleave', function () { paused = false; startProgress(); });
    }

    startProgress();
});
</script>
@endif
@endpush
