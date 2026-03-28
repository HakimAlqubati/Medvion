{{-- ============================================================
     Hero Section 2 – Medvion | Orbital Medical Ecosystem Theme
     ============================================================
     نسخة مستقلة تمامًا. لا تعدّل Hero Section الأصلي.
     آلية التبديل: في welcome.blade.php استخدم:
         <x-frontend.hero  :slides="$slides" /> — النسخة الأصلية
         <x-frontend.hero2 />                  — هذه النسخة
     ============================================================ --}}
<section
    id="hero2-root"
    aria-label="{{ __('land.hero2_aria_label') }}"
    class="relative min-h-screen flex items-center overflow-hidden bg-primary-deep"
>

    {{-- ══════ AMBIENT BACKGROUND LAYER ══════ --}}
    <div class="absolute inset-0 z-0 pointer-events-none" aria-hidden="true">

        {{-- Deep radial glow — centered --}}
        <div class="hero2-ambient-glow absolute inset-0"
             style="background: radial-gradient(ellipse 70% 60% at 50% 50%, rgba(26,82,206,0.13) 0%, rgba(13,148,136,0.07) 45%, transparent 70%);"></div>

        {{-- Top-right accent --}}
        <div class="absolute -top-40 -end-40 w-[600px] h-[600px] rounded-full"
             style="background: radial-gradient(circle, rgba(26,82,206,0.08) 0%, transparent 70%); animation: hero2-float 20s ease-in-out infinite alternate;"></div>

        {{-- Bottom-left accent --}}
        <div class="absolute -bottom-32 -start-32 w-[500px] h-[500px] rounded-full"
             style="background: radial-gradient(circle, rgba(13,148,136,0.07) 0%, transparent 70%); animation: hero2-float 25s ease-in-out infinite alternate-reverse;"></div>

        {{-- Subtle dot grid texture --}}
        <div class="absolute inset-0 opacity-[0.025]"
             style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 36px 36px;"></div>
    </div>

    {{-- ══════ CONTENT WRAPPER ══════ --}}
    <div class="relative z-10 w-full max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-32 md:py-0 md:min-h-screen md:flex md:items-center">

        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-8 items-center">

            {{-- ─────────────────────────────────────
                 LEFT / START COLUMN — Text Content
            ───────────────────────────────────────── --}}
            <div class="hero2-text-col order-2 lg:order-1 text-center lg:{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">

                {{-- Platform Badge --}}
                <div class="hero2-enter inline-flex items-center gap-2.5 mb-8 px-4 py-2 rounded-full border border-primary/25 bg-primary/8 backdrop-blur-sm"
                     style="animation-delay: 0.05s;">
                    <span class="relative flex h-2 w-2 flex-shrink-0">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-70"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
                    </span>
                    <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-secondary">
                        {{ __('land.hero2_badge') }}
                    </span>
                </div>

                {{-- Main Headline --}}
                <h1 class="hero2-enter font-black leading-[1.08] tracking-tight mb-6 text-white"
                    style="animation-delay: 0.12s;">
                    <span class="block text-3xl sm:text-4xl xl:text-5xl 2xl:text-[3.4rem]">
                        {{ __('land.hero2_title_line1') }}
                    </span>
                    <span class="block text-3xl sm:text-4xl xl:text-5xl 2xl:text-[3.4rem] mt-1.5
                                 text-transparent bg-clip-text
                                 bg-gradient-to-r from-primary-light via-secondary-light to-secondary
                                 rtl:bg-gradient-to-l">
                        {{ __('land.hero2_title_line2') }}
                    </span>
                </h1>

                {{-- Subtitle --}}
                <p class="hero2-enter text-base sm:text-[1.05rem] text-white/65 leading-relaxed mb-10 max-w-prose"
                   style="animation-delay: 0.22s;">
                    {{ __('land.hero2_subtitle') }}
                </p>

                {{-- Stats row --}}
                <div class="hero2-enter flex flex-wrap justify-center lg:justify-{{ app()->getLocale() === 'ar' ? 'end' : 'start' }} gap-6 mb-10"
                     style="animation-delay: 0.3s;" aria-label="{{ __('land.hero2_stats_aria') }}">

                    @php
                        $stats = [
                            ['value' => __('land.hero2_stat1_val'), 'label' => __('land.hero2_stat1_label')],
                            ['value' => __('land.hero2_stat2_val'), 'label' => __('land.hero2_stat2_label')],
                            ['value' => __('land.hero2_stat3_val'), 'label' => __('land.hero2_stat3_label')],
                        ];
                    @endphp

                    @foreach ($stats as $stat)
                    <div class="flex flex-col items-center lg:items-{{ app()->getLocale() === 'ar' ? 'end' : 'start' }} gap-0.5">
                        <span class="text-2xl font-black text-white tabular-nums">{{ $stat['value'] }}</span>
                        <span class="text-[11px] text-white/45 uppercase tracking-widest font-medium">{{ $stat['label'] }}</span>
                    </div>
                    @endforeach
                </div>

                {{-- CTA Buttons --}}
                <div class="hero2-enter flex flex-wrap gap-3.5 justify-center lg:justify-{{ app()->getLocale() === 'ar' ? 'end' : 'start' }}"
                     style="animation-delay: 0.38s;">

                    <a href="#courses"
                       class="group inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl font-bold text-sm text-white
                              bg-gradient-to-br from-primary to-primary-dark
                              shadow-lg shadow-primary/25
                              hover:shadow-primary/40 hover:-translate-y-0.5
                              transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-primary-deep">
                        {{-- Arrow icon (flipped for RTL) --}}
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1 rtl:rotate-180 rtl:group-hover:-translate-x-1"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                        {{ __('land.hero2_cta_primary') }}
                    </a>

                    <a href="{{ url('/about') }}"
                       class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-semibold text-sm text-white/80
                              border border-white/12 bg-white/[0.04]
                              hover:bg-white/[0.09] hover:border-white/22 hover:text-white hover:-translate-y-0.5
                              transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white/30 focus:ring-offset-2 focus:ring-offset-primary-deep">
                        {{ __('land.hero2_cta_secondary') }}
                    </a>
                </div>

            </div>{{-- /text col --}}


            {{-- ─────────────────────────────────────
                 RIGHT / END COLUMN — Orbital Visual
            ───────────────────────────────────────── --}}
            <div class="hero2-enter order-1 lg:order-2 flex items-center justify-center"
                 style="animation-delay: 0.08s;"
                 aria-hidden="true">

                <div class="hero2-orbital-scene relative w-[280px] h-[280px] sm:w-[350px] sm:h-[350px] lg:w-[380px] lg:h-[380px] xl:w-[440px] xl:h-[440px] 2xl:w-[480px] 2xl:h-[480px]">

                    {{-- ── RING 1 (outer) ── --}}
                    <div class="hero2-ring hero2-ring--outer absolute inset-0 rounded-full border border-white/[0.07]"
                         style="animation: hero2-rotate-cw 60s linear infinite;">

                        {{-- Orbit node: Courses --}}
                        <div class="hero2-node" style="top: -1.35rem; left: 50%; transform: translateX(-50%);"
                             data-tooltip="{{ __('land.hero2_node_courses') }}">
                            <div class="hero2-node-icon bg-gradient-to-br from-primary/90 to-primary-dark">
                                {{-- Book/Course icon --}}
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.966 8.966 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <span class="hero2-node-label">{{ __('land.hero2_node_courses') }}</span>
                        </div>

                        {{-- Orbit node: Certificates --}}
                        <div class="hero2-node" style="bottom: -1.35rem; left: 50%; transform: translateX(-50%);"
                             data-tooltip="{{ __('land.hero2_node_certs') }}">
                            <div class="hero2-node-icon bg-gradient-to-br from-secondary/90 to-secondary-dark">
                                {{-- Badge/cert icon --}}
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                </svg>
                            </div>
                            <span class="hero2-node-label">{{ __('land.hero2_node_certs') }}</span>
                        </div>

                        {{-- Orbit node: Lectures --}}
                        <div class="hero2-node" style="top: 50%; {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: -1.35rem; transform: translateY(-50%);"
                             data-tooltip="{{ __('land.hero2_node_lectures') }}">
                            <div class="hero2-node-icon bg-gradient-to-br from-violet-600/90 to-violet-800">
                                {{-- Lecture icon --}}
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                            <span class="hero2-node-label">{{ __('land.hero2_node_lectures') }}</span>
                        </div>

                        {{-- Orbit node: Exams --}}
                        <div class="hero2-node" style="top: 50%; {{ app()->getLocale() === 'ar' ? 'left' : 'right' }}: -1.35rem; transform: translateY(-50%);"
                             data-tooltip="{{ __('land.hero2_node_exams') }}">
                            <div class="hero2-node-icon bg-gradient-to-br from-amber-500/90 to-amber-700">
                                {{-- Exam/quiz icon --}}
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z" />
                                </svg>
                            </div>
                            <span class="hero2-node-label">{{ __('land.hero2_node_exams') }}</span>
                        </div>

                    </div>{{-- /ring 1 --}}

                    {{-- ── RING 2 (inner) ── --}}
                    <div class="hero2-ring hero2-ring--inner absolute rounded-full border border-white/[0.055]"
                         style="inset: 18%; animation: hero2-rotate-ccw 45s linear infinite;">

                        {{-- Inner node: Clinical Cases --}}
                        <div class="hero2-node hero2-node--sm" style="top: -1.1rem; left: 50%; transform: translateX(-50%);"
                             data-tooltip="{{ __('land.hero2_node_cases') }}">
                            <div class="hero2-node-icon hero2-node-icon--sm bg-gradient-to-br from-rose-500/90 to-rose-700">
                                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </div>
                            <span class="hero2-node-label">{{ __('land.hero2_node_cases') }}</span>
                        </div>

                        {{-- Inner node: Community --}}
                        <div class="hero2-node hero2-node--sm" style="bottom: -1.1rem; left: 50%; transform: translateX(-50%);"
                             data-tooltip="{{ __('land.hero2_node_community') }}">
                            <div class="hero2-node-icon hero2-node-icon--sm bg-gradient-to-br from-sky-500/90 to-sky-700">
                                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            </div>
                            <span class="hero2-node-label">{{ __('land.hero2_node_community') }}</span>
                        </div>

                    </div>{{-- /ring 2 --}}

                    {{-- ── CENTER CORE ── --}}
                    <div class="absolute inset-[28%] flex items-center justify-center">

                        {{-- Outer pulse ring --}}
                        <div class="absolute inset-0 rounded-full border border-primary/20"
                             style="animation: hero2-pulse-ring 3.5s ease-in-out infinite;"></div>

                        {{-- Inner solid core --}}
                        <div class="relative w-full h-full rounded-full flex flex-col items-center justify-center text-center
                                    bg-gradient-to-br from-primary-dark/80 to-primary-deep
                                    border border-white/10
                                    shadow-[0_0_60px_-10px_rgba(26,82,206,0.35)]">

                            {{-- Medical cross glyph --}}
                            <div class="mb-2 text-primary/80"
                                 style="animation: hero2-breathe 4s ease-in-out infinite;">
                                <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>

                            <span class="text-white font-black text-base sm:text-lg tracking-tight leading-none">
                                Medvion
                            </span>
                            <span class="text-[9px] sm:text-[10px] text-white/35 uppercase tracking-[0.15em] mt-0.5 font-semibold">
                                {{ __('land.hero2_core_tagline') }}
                            </span>
                        </div>

                    </div>{{-- /center --}}

                </div>{{-- /orbital-scene --}}
            </div>{{-- /orbital col --}}

        </div>{{-- /grid --}}
    </div>{{-- /content wrapper --}}

    {{-- ══════ SCROLL HINT ══════ --}}
    <div class="absolute bottom-7 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-1.5 opacity-30 pointer-events-none"
         aria-hidden="true">
        <span class="text-white text-[9px] uppercase tracking-[0.22em]">{{ __('land.hero_scroll') }}</span>
        <div class="hero2-scroll-mouse">
            <div class="hero2-scroll-wheel"></div>
        </div>
    </div>

</section>

{{-- ══════════════════════════════════════════
     STYLES — Scoped to hero2-* classes
     GPU-friendly: only transform & opacity animated
══════════════════════════════════════════ --}}
@push('styles')
<style>
/* ── Hero 2: Entry animation ── */
.hero2-enter {
    animation: hero2-rise 0.8s cubic-bezier(0.22, 1, 0.36, 1) both;
}
@keyframes hero2-rise {
    from { opacity: 0; transform: translateY(22px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── Ambient glow fade-in ── */
.hero2-ambient-glow {
    animation: hero2-glow-in 1.8s ease both;
}
@keyframes hero2-glow-in {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* ── Background float (orbs) ── */
@keyframes hero2-float {
    from { transform: translate(0, 0) scale(1); }
    to   { transform: translate(20px, -18px) scale(1.06); }
}

/* ── Orbital rings rotation ── */
@keyframes hero2-rotate-cw  { to { transform: rotate(360deg);  } }
@keyframes hero2-rotate-ccw { to { transform: rotate(-360deg); } }

/* ── Center core pulse ring ── */
@keyframes hero2-pulse-ring {
    0%, 100% { transform: scale(1);    opacity: 0.5; }
    50%       { transform: scale(1.12); opacity: 0.15; }
}

/* ── Center medical cross breathe ── */
@keyframes hero2-breathe {
    0%, 100% { opacity: 0.7; transform: scale(1); }
    50%       { opacity: 1;   transform: scale(1.05); }
}

/* ── Orbit rings visual ── */
.hero2-ring {
    will-change: transform;
}
.hero2-ring--outer {
    /* Decorative glimmer: one bright point on the ring */
    box-shadow: 0 0 0 1px transparent, inset 0 0 30px rgba(26,82,206,0.05);
}
.hero2-ring--inner {
    box-shadow: 0 0 0 1px transparent, inset 0 0 20px rgba(13,148,136,0.04);
}

/* ── Orbit nodes (counter-rotate so icon stays upright) ── */
.hero2-node {
    position: absolute;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
    /* counter-rotate to keep icons readable */
}
.hero2-ring--outer .hero2-node {
    animation: hero2-rotate-ccw 60s linear infinite;
}
.hero2-ring--inner .hero2-node {
    animation: hero2-rotate-cw 45s linear infinite;
}

.hero2-node-icon {
    width: 3.8rem;
    height: 3.8rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1.5px solid rgba(255,255,255,0.15);
    box-shadow: 0 4px 20px rgba(0,0,0,0.35), 0 0 0 3px rgba(255,255,255,0.04);
    transition: transform 0.4s cubic-bezier(0.22,1,0.36,1), box-shadow 0.4s ease;
    cursor: default;
    backdrop-filter: blur(2px);
    will-change: transform;
}
.hero2-node-icon--sm {
    width: 3rem;
    height: 3rem;
}
.hero2-node:hover .hero2-node-icon {
    transform: scale(1.18);
    box-shadow: 0 8px 28px rgba(0,0,0,0.5), 0 0 0 4px rgba(255,255,255,0.1);
}

.hero2-node-label {
    font-size: 11px;
    font-weight: 700;
    color: white;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    white-space: nowrap;
    opacity: 0;
    transform: translateY(10px) rotate(0deg) !important;
    transition: all 0.4s cubic-bezier(0.22,1,0.36,1);
    text-shadow: 0 2px 10px rgba(0,0,0,0.8);
    pointer-events: none;
    background: rgba(0,0,0,0.6);
    padding: 4px 10px;
    border-radius: 6px;
    backdrop-filter: blur(6px);
    border: 1px solid rgba(255,255,255,0.1);
    position: absolute;
    top: 100%;
    margin-top: 8px;
}
.hero2-node:hover .hero2-node-label {
    opacity: 1;
    transform: translateY(0) rotate(0deg) !important;
}
.hero2-node--sm .hero2-node-label {
    font-size: 9px;
}

/* ── Scroll hint ── */
.hero2-scroll-mouse  { width: 18px; height: 30px; border: 1.5px solid rgba(255,255,255,0.25); border-radius: 10px; display: flex; justify-content: center; padding-top: 5px; }
.hero2-scroll-wheel  { width: 3px; height: 4px; background: rgba(255,255,255,0.5); border-radius: 3px; animation: hero2-scroll 2s ease-in-out infinite; }
@keyframes hero2-scroll {
    0%   { opacity: 1; transform: translateY(0); }
    70%  { opacity: 0; transform: translateY(7px); }
    100% { opacity: 0; transform: translateY(0); }
}

/* ── Reduce motion (accessibility) ── */
@media (prefers-reduced-motion: reduce) {
    .hero2-ring,
    .hero2-ring--outer .hero2-node,
    .hero2-ring--inner .hero2-node,
    .hero2-ambient-glow,
    .hero2-scroll-wheel,
    [style*="animation"] { animation: none !important; }
}

/* ── Mobile tweaks ── */
@media (max-width: 639px) {
    .hero2-orbital-scene {
        transform: scale(0.82);
        transform-origin: center center;
    }
}
</style>
@endpush
