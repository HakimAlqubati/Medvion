{{-- ============================================================
     Hero Section – Medvion Platform | Cinematic Slider
     ============================================================ --}}

{{-- Slide data (no fake numbers, pure promotional) --}}
@php
$slides = [
    [
        'image'    => '/images/hero-slide-1.png',
        'badge'    => __('land.hero_badge'),
        'title_1'  => __('land.slide1_title1'),
        'title_2'  => __('land.slide1_title2'),
        'subtitle' => __('land.slide1_subtitle'),
    ],
    [
        'image'    => '/images/hero-slide-2.png',
        'badge'    => __('land.hero_badge'),
        'title_1'  => __('land.slide2_title1'),
        'title_2'  => __('land.slide2_title2'),
        'subtitle' => __('land.slide2_subtitle'),
    ],
    [
        'image'    => '/images/hero-slide-3.png',
        'badge'    => __('land.hero_badge'),
        'title_1'  => __('land.slide3_title1'),
        'title_2'  => __('land.slide3_title2'),
        'subtitle' => __('land.slide3_subtitle'),
    ],
];
@endphp

<section id="hero-root"
    class="relative overflow-hidden min-h-screen flex items-end pb-20 md:items-center md:pb-0"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
>

    {{-- ══════════════════════════════════════════
         SLIDE IMAGES – stacked, crossfade
    ══════════════════════════════════════════ --}}
    <div id="hero-slides" class="absolute inset-0 z-0">
        @foreach ($slides as $i => $slide)
        <div
            class="hero-slide absolute inset-0 transition-opacity duration-[1400ms] ease-in-out {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
            data-index="{{ $i }}"
        >
            {{-- The image with its own Ken Burns animation (staggered per slide) --}}
            <div
                class="absolute inset-0 bg-center bg-cover hero-slide-img"
                style="background-image: url('{{ $slide['image'] }}');
                       animation: kenburns-{{ $i }} {{ 14 + $i * 2 }}s ease-in-out infinite alternate;"
            ></div>

            {{-- Gradient overlay: strong left vignette + bottom fade --}}
            <div class="absolute inset-0 hero-overlay"></div>
        </div>
        @endforeach
    </div>

    {{-- ══════════════════════════════════════════
         FLOATING ORBS
    ══════════════════════════════════════════ --}}
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="orb orb-a absolute w-[500px] h-[500px] -top-20 -start-32 rounded-full blur-3xl"></div>
        <div class="orb orb-b absolute w-[380px] h-[380px] bottom-0 end-0 rounded-full blur-3xl"></div>
    </div>

    {{-- ══════════════════════════════════════════
         CONTENT
    ══════════════════════════════════════════ --}}
    <div class="relative z-10 w-full max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-36 pb-24 md:py-0 md:min-h-screen md:flex md:items-center">

        <div class="max-w-2xl lg:max-w-3xl {{ app()->getLocale() === 'ar' ? 'ms-auto text-right' : 'me-auto text-left' }}">

            {{-- Badge --}}
            <div id="hero-badge" class="hero-enter inline-flex items-center gap-2 mb-7 px-4 py-2 rounded-full hero-badge-glass" style="animation-delay:0.05s">
                <span class="pulse-dot"></span>
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-cyan-300" id="slide-badge">
                    {{ $slides[0]['badge'] }}
                </span>
            </div>

            {{-- Headline --}}
            <h1 class="hero-enter font-black text-white leading-[1.06] tracking-tight mb-6 drop-shadow-xl" style="animation-delay:0.15s">
                <span id="slide-title-1" class="block text-4xl sm:text-5xl xl:text-6xl slide-text-fade">
                    {{ $slides[0]['title_1'] }}
                </span>
                <span id="slide-title-2" class="block text-4xl sm:text-5xl xl:text-6xl hero-grad-text slide-text-fade mt-1 drop-shadow-2xl">
                    {{ $slides[0]['title_2'] }}
                </span>
            </h1>

            {{-- Subtitle --}}
            <p id="slide-subtitle" class="hero-enter text-base sm:text-lg text-white/80 leading-relaxed mb-10 max-w-xl slide-text-fade drop-shadow-md font-medium" style="animation-delay:0.25s">
                {{ $slides[0]['subtitle'] }}
            </p>

            {{-- CTAs --}}
            <div class="hero-enter flex flex-wrap gap-4 mb-16 {{ app()->getLocale() === 'ar' ? 'justify-end sm:justify-start' : 'justify-start' }}" style="animation-delay:0.35s">
                <a href="#courses" class="cta-primary group inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl font-bold text-sm text-white">
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                    {{ __('land.hero_cta_primary') }}
                </a>
                <a href="{{ url('/about') }}" class="cta-secondary inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-sm text-white/85">
                    {{ __('land.hero_cta_secondary') }}
                </a>
            </div>

            {{-- ── Slide indicators (dots + progress line) ── --}}
            <div class="hero-enter flex items-center gap-5 {{ app()->getLocale() === 'ar' ? 'justify-end sm:justify-start' : 'justify-start' }}" style="animation-delay:0.45s">

                {{-- Dot + label per slide --}}
                <div class="flex items-center gap-3">
                    @foreach ($slides as $i => $slide)
                    <button
                        class="hero-dot-btn group flex items-center gap-2 cursor-pointer"
                        data-slide="{{ $i }}"
                        aria-label="Slide {{ $i + 1 }}"
                    >
                        <span class="hero-dot {{ $i === 0 ? 'is-active' : '' }}"></span>
                    </button>
                    @endforeach
                </div>

                {{-- Progress bar --}}
                <div class="flex-1 max-w-[160px] h-0.5 bg-white/15 rounded-full overflow-hidden">
                    <div id="hero-progress" class="h-full bg-gradient-to-r from-cyan-400 to-indigo-400 rounded-full" style="width:0%"></div>
                </div>

                {{-- Counter --}}
                <span class="text-white/35 text-xs font-bold tracking-widest tabular-nums">
                    <span id="hero-counter">01</span> / 0{{ count($slides) }}
                </span>
            </div>

        </div>
    </div>

    {{-- Scroll hint --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-1.5 opacity-30 pointer-events-none">
        <span class="text-white text-[9px] uppercase tracking-[0.2em]">{{ __('land.hero_scroll') }}</span>
        <div class="scroll-mouse"><div class="scroll-wheel"></div></div>
    </div>

</section>

{{-- ============================================================
     STYLES
     ============================================================ --}}
<style>
/* ── Slide overlays ── */
.hero-overlay {
    background:
        linear-gradient(105deg, rgba(1,6,17,0.95) 0%, rgba(3,10,24,0.65) 50%, transparent 100%),
        linear-gradient(0deg,   rgba(1,6,17,0.85) 0%, rgba(3,10,24,0.3) 50%, transparent 100%);
}

/* ── Orbs ── */
.orb { animation: orb-pulse 16s ease-in-out infinite alternate; }
.orb-a { background: radial-gradient(circle, rgba(6,182,212,0.14) 0%, transparent 70%); animation-duration: 14s; }
.orb-b { background: radial-gradient(circle, rgba(139,92,246,0.12) 0%, transparent 70%); animation-duration: 18s; }
@keyframes orb-pulse {
    from { transform: scale(1) translate(0,0); opacity: 0.7; }
    to   { transform: scale(1.15) translate(20px,-15px); opacity: 1; }
}

/* ── Ken Burns per slide ── */
@keyframes kenburns-0 {
    0%   { transform: scale(1.00) translate(0%,   0%); }
    50%  { transform: scale(1.08) translate(-1%,  0.5%); }
    100% { transform: scale(1.04) translate(1%, -0.5%); }
}
@keyframes kenburns-1 {
    0%   { transform: scale(1.05) translate(0.5%, 0%); }
    50%  { transform: scale(1.00) translate(-0.5%, -1%); }
    100% { transform: scale(1.08) translate(0%, 0.5%); }
}
@keyframes kenburns-2 {
    0%   { transform: scale(1.03) translate(-0.5%, 0.5%); }
    50%  { transform: scale(1.08) translate(0.5%, -0.5%); }
    100% { transform: scale(1.00) translate(0%, 0%); }
}

/* ── Hero gradient text ── */
.hero-grad-text {
    background: linear-gradient(90deg, #22d3ee 0%, #818cf8 55%, #a78bfa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* ── Badge glass ── */
.hero-badge-glass {
    background: rgba(6,182,212,0.10);
    border: 1px solid rgba(6,182,212,0.28);
    backdrop-filter: blur(10px);
}
.pulse-dot {
    display: inline-block;
    width: 7px; height: 7px;
    border-radius: 50%;
    background: #22d3ee;
    flex-shrink: 0;
    animation: dot-pulse 2s ease-in-out infinite;
}
@keyframes dot-pulse {
    0%,100% { box-shadow: 0 0 0 0 rgba(34,211,238,0.6); }
    50%      { box-shadow: 0 0 0 6px rgba(34,211,238,0); }
}

/* ── CTA buttons ── */
.cta-primary {
    background: linear-gradient(135deg, #06b6d4, #6366f1);
    box-shadow: 0 5px 24px rgba(6,182,212,0.38);
    transition: box-shadow 0.3s, transform 0.25s;
}
.cta-primary:hover { box-shadow: 0 8px 36px rgba(6,182,212,0.6); transform: translateY(-2px); }
.cta-secondary {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.15);
    backdrop-filter: blur(8px);
    transition: background 0.3s, transform 0.25s;
}
.cta-secondary:hover { background: rgba(255,255,255,0.14); transform: translateY(-2px); }

/* ── Dot indicators ── */
.hero-dot {
    display: block;
    width: 6px; height: 6px;
    border-radius: 9999px;
    background: rgba(255,255,255,0.3);
    transition: all 0.4s cubic-bezier(.22,1,.36,1);
}
.hero-dot.is-active {
    width: 28px;
    background: #22d3ee;
    box-shadow: 0 0 10px rgba(34,211,238,0.5);
}

/* ── Text crossfade ── */
.slide-text-fade { transition: opacity 0.5s ease, transform 0.5s ease; }
.slide-text-fade.fading { opacity: 0; transform: translateY(8px); }

/* ── Entry animations ── */
.hero-enter { animation: hero-rise 0.75s cubic-bezier(.22,1,.36,1) both; }
@keyframes hero-rise {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Scroll mouse ── */
.scroll-mouse { width: 22px; height: 34px; border: 1.5px solid rgba(255,255,255,0.25); border-radius: 11px; display: flex; justify-content: center; padding-top: 6px; }
.scroll-wheel  { width: 3px; height: 6px; background: rgba(255,255,255,0.5); border-radius: 3px; animation: scroll-anim 2s ease-in-out infinite; }
@keyframes scroll-anim {
    0%   { opacity:1; transform: translateY(0); }
    70%  { opacity:0; transform: translateY(10px); }
    100% { opacity:0; transform: translateY(0); }
}
</style>

{{-- ============================================================
     SLIDER SCRIPT
     ============================================================ --}}
<script>
(function () {
    var TOTAL        = {{ count($slides) }};
    var INTERVAL_MS  = 4000;
    var TICK         = 50;
    var current      = 0;
    var progTimer    = null;
    var progVal      = 0;
    var paused       = false;

    var slideEls  = document.querySelectorAll('.hero-slide');
    var dotEls    = document.querySelectorAll('.hero-dot');
    var dotBtns   = document.querySelectorAll('.hero-dot-btn');
    var progressEl = document.getElementById('hero-progress');
    var counterEl  = document.getElementById('hero-counter');
    var title1El   = document.getElementById('slide-title-1');
    var title2El   = document.getElementById('slide-title-2');
    var subtitleEl = document.getElementById('slide-subtitle');
    var badgeSpan  = document.getElementById('slide-badge');

    var texts = [
        @foreach ($slides as $i => $slide)
        { badge: {!! json_encode($slide['badge']) !!}, title1: {!! json_encode($slide['title_1']) !!}, title2: {!! json_encode($slide['title_2']) !!}, subtitle: {!! json_encode($slide['subtitle']) !!} },
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
        [title1El, title2El, subtitleEl].forEach(function(el){ el.classList.add('fading'); });
        slideEls[current].style.opacity = '0';
        current = index;
        slideEls[current].style.opacity = '1';
        dotEls.forEach(function(d){ d.classList.remove('is-active'); });
        dotEls[current].classList.add('is-active');
        counterEl.textContent = String(current + 1).padStart(2, '0');
        setTimeout(function () {
            if (badgeSpan) badgeSpan.textContent = texts[current].badge;
            title1El.textContent   = texts[current].title1;
            title2El.textContent   = texts[current].title2;
            subtitleEl.textContent = texts[current].subtitle;
            [title1El, title2El, subtitleEl].forEach(function(el){ el.classList.remove('fading'); });
        }, 350);
    }

    function resetProgress() {
        clearInterval(progTimer);
        progVal = 0;
        progressEl.style.width = '0%';
    }

    function startProgress() {
        if (paused) return;
        resetProgress();
        var step = (TICK / INTERVAL_MS) * 100;
        progTimer = setInterval(function () {
            if (paused) return;
            progVal = Math.min(progVal + step, 100);
            progressEl.style.width = progVal + '%';
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
})();
</script>
