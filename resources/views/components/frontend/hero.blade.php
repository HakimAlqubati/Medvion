{{-- ============================================================
     Hero Section – Medvion Platform (Luxury Launch Edition)
     ============================================================ --}}
<section class="hero-section relative overflow-hidden min-h-screen flex items-center" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

    {{-- ── Animated background image (Ken Burns) ── --}}
    <div class="absolute inset-0 hero-img-wrap">
        <div class="absolute inset-0 hero-img-layer"></div>
        {{-- Dark overlay to keep readability --}}
        <div class="absolute inset-0 hero-img-overlay"></div>
    </div>

    {{-- ── Floating orbs / glows ── --}}
    <div class="absolute top-[-10%] start-[-8%] w-[520px] h-[520px] hero-orb orb-1 rounded-full blur-3xl"></div>
    <div class="absolute bottom-[-15%] end-[-5%]  w-[420px] h-[420px] hero-orb orb-2 rounded-full blur-3xl"></div>
    <div class="absolute top-[40%]   start-[30%]  w-[280px] h-[280px] hero-orb orb-3 rounded-full blur-3xl"></div>

    {{-- ── Animated grid overlay ── --}}
    <div class="absolute inset-0 hero-grid opacity-[0.04]"></div>

    {{-- ── Content wrapper ── --}}
    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28 lg:py-36">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- ── LEFT COLUMN – text ── --}}
            <div class="hero-text-col text-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}">

                {{-- Launch badge --}}
                <div class="hero-anim-1 inline-flex items-center gap-2 mb-8 px-4 py-2 rounded-full hero-badge">
                    <span class="live-dot"></span>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-secondary-light">
                        {{ __('land.hero_badge') }}
                    </span>
                </div>

                {{-- Headline --}}
                <h1 class="hero-anim-2 text-4xl sm:text-5xl xl:text-[3.75rem] font-black leading-[1.08] text-white mb-6 tracking-tight">
                    <span class="block">{{ __('land.hero_title_line1') }}</span>
                    <span class="block hero-gradient-text mt-1">{{ __('land.hero_title_line2') }}</span>
                </h1>

                {{-- Subtitle --}}
                <p class="hero-anim-3 text-base sm:text-lg text-white/65 leading-relaxed mb-10 max-w-xl">
                    {{ __('land.hero_subtitle') }}
                </p>

                {{-- CTAs --}}
                <div class="hero-anim-4 flex flex-wrap gap-4 {{ app()->getLocale() === 'ar' ? 'justify-end sm:justify-start' : 'justify-start' }}">
                    <a href="#courses" class="hero-cta-primary group inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold text-sm text-white transition-all duration-300">
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        {{ __('land.hero_cta_primary') }}
                    </a>
                    <a href="{{ url('/about') }}" class="hero-cta-secondary inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold text-sm text-white/85 transition-all duration-300">
                        {{ __('land.hero_cta_secondary') }}
                    </a>
                </div>

                {{-- Trust line --}}
                <div class="hero-anim-5 mt-12 flex items-center gap-3 {{ app()->getLocale() === 'ar' ? 'justify-end sm:justify-start' : 'justify-start' }}">
                    {{-- Avatars stack --}}
                    <div class="flex -space-x-2 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                        @foreach(['bg-sky-400','bg-teal-400','bg-violet-400','bg-pink-400'] as $color)
                        <div class="w-8 h-8 rounded-full border-2 border-white/10 {{ $color }} flex items-center justify-center">
                            <svg class="w-4 h-4 text-white/90" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
                        </div>
                        @endforeach
                    </div>
                    <p class="text-white/50 text-xs leading-snug">
                        {{ __('land.hero_trust_line') }}
                    </p>
                </div>

            </div>{{-- /text col --}}

            {{-- ── RIGHT COLUMN – visual card stack ── --}}
            <div class="hero-anim-right relative hidden lg:flex items-center justify-center">

                {{-- Central glowing card --}}
                <div class="hero-main-card relative z-10 w-full max-w-sm mx-auto rounded-2xl p-8 hero-card-glass">

                    {{-- Card top row --}}
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl hero-icon-bg flex items-center justify-center">
                                <svg class="w-5 h-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.966 8.966 0 00-6 2.292m0-14.25v14.25"/></svg>
                            </div>
                            <div>
                                <p class="text-white font-bold text-sm">{{ __('land.hero_card_title') }}</p>
                                <p class="text-white/40 text-xs">{{ __('land.hero_card_subtitle') }}</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">{{ __('land.hero_card_live') }}</span>
                    </div>

                    {{-- Simulated course list --}}
                    @foreach([
                        ['land.course_1_title', 'land.course_1_category', 'bg-sky-500/20 text-sky-300'],
                        ['land.course_2_title', 'land.course_2_category', 'bg-violet-500/20 text-violet-300'],
                        ['land.course_3_title', 'land.course_3_category', 'bg-teal-500/20 text-teal-300'],
                    ] as [$titleKey, $catKey, $badgeClass])
                    <div class="flex items-center gap-3 mb-4 p-3 rounded-xl hero-course-row">
                        <div class="w-9 h-9 rounded-lg flex-shrink-0 {{ explode(' ', $badgeClass)[0] }} flex items-center justify-center">
                            <svg class="w-4 h-4 {{ explode(' ', $badgeClass)[1] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-white text-xs font-semibold truncate">{{ __($titleKey) }}</p>
                            <p class="text-white/40 text-[10px] mt-0.5">{{ __($catKey) }}</p>
                        </div>
                        <svg class="w-3.5 h-3.5 text-white/20 flex-shrink-0 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </div>
                    @endforeach

                    {{-- CTA inside card --}}
                    <a href="#courses" class="mt-2 w-full flex items-center justify-center gap-2 py-3 rounded-xl hero-card-btn text-white text-xs font-bold transition-all duration-300">
                        {{ __('land.hero_cta_primary') }}
                    </a>
                </div>

                {{-- Floating badge – top right --}}
                <div class="absolute -top-6 -end-4 hero-float-badge rounded-2xl px-4 py-3 text-center shadow-2xl animate-float-a">
                    <div class="w-8 h-8 mx-auto mb-1 rounded-full bg-secondary/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/></svg>
                    </div>
                    <p class="text-white text-xs font-bold">{{ __('land.hero_badge_cert') }}</p>
                    <p class="text-white/40 text-[9px] mt-0.5">{{ __('land.hero_badge_cert_sub') }}</p>
                </div>

                {{-- Floating badge – bottom left --}}
                <div class="absolute -bottom-4 -start-6 hero-float-badge rounded-2xl px-4 py-3 text-center shadow-2xl animate-float-b">
                    <div class="w-8 h-8 mx-auto mb-1 rounded-full bg-violet-500/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-violet-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/></svg>
                    </div>
                    <p class="text-white text-xs font-bold">{{ __('land.hero_badge_expert') }}</p>
                    <p class="text-white/40 text-[9px] mt-0.5">{{ __('land.hero_badge_expert_sub') }}</p>
                </div>

            </div>{{-- /visual col --}}

        </div>{{-- /grid --}}

    </div>{{-- /content wrapper --}}

    {{-- ── Scroll indicator ── --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 opacity-40">
        <p class="text-white text-[10px] uppercase tracking-widest">{{ __('land.hero_scroll') }}</p>
        <div class="scroll-mouse">
            <div class="scroll-wheel"></div>
        </div>
    </div>

</section>

{{-- ============================================================
     Hero Styles (scoped inline – no build tool dependency)
     ============================================================ --}}
<style>
/* ── Background image + Ken Burns ── */
.hero-img-wrap {
    overflow: hidden;
}
.hero-img-layer {
    background: url('/images/hero-bg.png') center center / cover no-repeat;
    animation: kenburns 30s ease-in-out infinite alternate;
    will-change: transform;
    transform-origin: center center;
}
.hero-img-overlay {
    background:
        linear-gradient(180deg, rgba(3,11,26,0.55) 0%, rgba(3,11,26,0.75) 100%),
        linear-gradient(90deg, rgba(3,11,26,0.45) 0%, transparent 60%);
}
@keyframes kenburns {
    0%   { transform: scale(1.00) translate(0%,   0%); }
    25%  { transform: scale(1.06) translate(-1.5%, 0.8%); }
    50%  { transform: scale(1.10) translate(1%,   -1%); }
    75%  { transform: scale(1.06) translate(0.5%, 1%); }
    100% { transform: scale(1.00) translate(0%,   0%); }
}

/* ── Orbs ── */
.hero-orb { position: absolute; }
.orb-1 { background: radial-gradient(circle, rgba(6,182,212,0.18) 0%, transparent 70%); animation: orb-drift 14s ease-in-out infinite; }
.orb-2 { background: radial-gradient(circle, rgba(139,92,246,0.15) 0%, transparent 70%); animation: orb-drift 18s ease-in-out infinite reverse; }
.orb-3 { background: radial-gradient(circle, rgba(20,184,166,0.10) 0%, transparent 70%); animation: orb-drift 10s ease-in-out infinite 4s; }

@keyframes orb-drift {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33%       { transform: translate(30px, -25px) scale(1.06); }
    66%       { transform: translate(-20px, 20px) scale(0.96); }
}

/* ── Grid ── */
.hero-grid {
    background-image:
        linear-gradient(rgba(255,255,255,1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,1) 1px, transparent 1px);
    background-size: 60px 60px;
}

/* ── Launch badge ── */
.hero-badge {
    background: rgba(6,182,212,0.08);
    border: 1px solid rgba(6,182,212,0.25);
    backdrop-filter: blur(10px);
}
.live-dot {
    width: 7px; height: 7px;
    border-radius: 50%;
    background: #06b6d4;
    box-shadow: 0 0 0 0 rgba(6,182,212,0.6);
    animation: pulse-dot 2s infinite;
    display: inline-block;
    flex-shrink: 0;
}
@keyframes pulse-dot {
    0%   { box-shadow: 0 0 0 0 rgba(6,182,212,0.6); }
    70%  { box-shadow: 0 0 0 7px rgba(6,182,212,0); }
    100% { box-shadow: 0 0 0 0 rgba(6,182,212,0); }
}

/* ── Gradient text ── */
.hero-gradient-text {
    background: linear-gradient(90deg, #06b6d4 0%, #818cf8 50%, #a78bfa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* ── CTA Buttons ── */
.hero-cta-primary {
    background: linear-gradient(135deg, #06b6d4, #6366f1);
    box-shadow: 0 6px 30px rgba(6,182,212,0.35);
}
.hero-cta-primary:hover {
    box-shadow: 0 10px 40px rgba(6,182,212,0.5);
    transform: translateY(-2px);
}
.hero-cta-secondary {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.12);
    backdrop-filter: blur(8px);
}
.hero-cta-secondary:hover {
    background: rgba(255,255,255,0.1);
    border-color: rgba(255,255,255,0.25);
    transform: translateY(-2px);
}

/* ── Main card ── */
.hero-card-glass {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.10);
    backdrop-filter: blur(24px);
    box-shadow:
        0 0 0 1px rgba(6,182,212,0.08),
        0 30px 80px rgba(0,0,0,0.4),
        inset 0 1px 0 rgba(255,255,255,0.06);
}
.hero-icon-bg {
    background: rgba(6,182,212,0.12);
    border: 1px solid rgba(6,182,212,0.2);
}
.hero-course-row {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.05);
    transition: background 0.2s;
}
.hero-course-row:hover {
    background: rgba(255,255,255,0.06);
}
.hero-card-btn {
    background: linear-gradient(135deg, rgba(6,182,212,0.2), rgba(99,102,241,0.2));
    border: 1px solid rgba(6,182,212,0.25);
}
.hero-card-btn:hover {
    background: linear-gradient(135deg, rgba(6,182,212,0.35), rgba(99,102,241,0.35));
}

/* ── Floating badges ── */
.hero-float-badge {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.10);
    backdrop-filter: blur(20px);
    min-width: 100px;
}
@keyframes float-a {
    0%, 100% { transform: translateY(0px); }
    50%       { transform: translateY(-10px); }
}
@keyframes float-b {
    0%, 100% { transform: translateY(0px); }
    50%       { transform: translateY(8px); }
}
.animate-float-a { animation: float-a 6s ease-in-out infinite; }
.animate-float-b { animation: float-b 7s ease-in-out infinite 1s; }

/* ── Entry animations ── */
.hero-anim-1  { animation: hero-rise 0.7s cubic-bezier(.22,1,.36,1) both; animation-delay: 0.1s; }
.hero-anim-2  { animation: hero-rise 0.7s cubic-bezier(.22,1,.36,1) both; animation-delay: 0.22s; }
.hero-anim-3  { animation: hero-rise 0.7s cubic-bezier(.22,1,.36,1) both; animation-delay: 0.34s; }
.hero-anim-4  { animation: hero-rise 0.7s cubic-bezier(.22,1,.36,1) both; animation-delay: 0.46s; }
.hero-anim-5  { animation: hero-rise 0.7s cubic-bezier(.22,1,.36,1) both; animation-delay: 0.58s; }
.hero-anim-right { animation: hero-rise-right 0.9s cubic-bezier(.22,1,.36,1) both; animation-delay: 0.35s; }

@keyframes hero-rise {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes hero-rise-right {
    from { opacity: 0; transform: translateX(40px) scale(0.97); }
    to   { opacity: 1; transform: translateX(0) scale(1); }
}

/* ── Scroll mouse ── */
.scroll-mouse {
    width: 22px; height: 34px;
    border: 1.5px solid rgba(255,255,255,0.25);
    border-radius: 11px;
    display: flex; justify-content: center; padding-top: 6px;
}
.scroll-wheel {
    width: 3px; height: 6px;
    background: rgba(255,255,255,0.5);
    border-radius: 3px;
    animation: scroll-anim 2s ease-in-out infinite;
}
@keyframes scroll-anim {
    0%   { opacity: 1; transform: translateY(0); }
    70%  { opacity: 0; transform: translateY(10px); }
    100% { opacity: 0; transform: translateY(0); }
}
</style>
