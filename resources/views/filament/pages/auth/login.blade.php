<x-filament-panels::page.simple>

<style>
    @import url('https://fonts.bunny.net/css?family=tajawal:400,500,700,800&display=swap');

    :root {
        --mv-primary: #1A52CE;
        --mv-bg: #030a18;
        --mv-cyan: #06b6d4;
        --mv-indigo: #6366f1;
    }

    /* ── Force layout full-width ── */
    .fi-simple-main-ctn {
        padding: 0 !important;
        max-width: 100vw !important;
    }
    .fi-simple-main {
        max-width: 100vw !important;
        width: 100vw !important;
        padding: 0 !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        background: transparent !important;
        margin: 0 !important;
    }
    .fi-simple-layout  { background: var(--mv-bg) !important; min-height: 100vh !important; }
    .fi-simple-page    { min-height: 100vh !important; }
    .fi-simple-page-content { padding: 0 !important; margin: 0 !important; }

    /* ── 2-column wrapper ── */
    .mv-wrap {
        display: flex;
        min-height: 100vh;
        font-family: 'Tajawal', sans-serif;
        direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};
    }

    /* ══ VISUAL PANEL ══ */
    .mv-visual {
        flex: 1;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #020810 0%, #091428 60%, #040d20 100%);
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    @media (min-width: 1024px) { .mv-visual { display: flex; } }

    /* Animated dot-grid */
    .mv-grid {
        position: absolute; inset: 0;
        background-image: radial-gradient(rgba(6,182,212,0.18) 1px, transparent 1px);
        background-size: 35px 35px;
        animation: gridDrift 30s linear infinite;
    }
    @keyframes gridDrift {
        from { background-position: 0 0; }
        to   { background-position: 35px 35px; }
    }

    /* Glowing orbs */
    .mv-orb { position: absolute; border-radius: 50%; filter: blur(70px); pointer-events: none; }
    .mv-orb-1 {
        width: 450px; height: 450px;
        background: radial-gradient(circle, rgba(6,182,212,0.18), transparent 70%);
        top: -10%; left: -5%;
        animation: orbFloat 10s ease-in-out infinite;
    }
    .mv-orb-2 {
        width: 350px; height: 350px;
        background: radial-gradient(circle, rgba(99,102,241,0.2), transparent 70%);
        bottom: -5%; right: -5%;
        animation: orbFloat 14s ease-in-out infinite reverse;
    }
    @keyframes orbFloat {
        0%, 100% { transform: translate(0,0) scale(1); }
        50%       { transform: translate(20px,-20px) scale(1.1); }
    }

    /* Rings */
    .mv-ring { position: absolute; border-radius: 50%; border: 1px solid rgba(6,182,212,0.1); }
    .mv-ring-1 { width: 350px; height: 350px; animation: spin 30s linear infinite; }
    .mv-ring-2 { width: 560px; height: 560px; animation: spin 48s linear infinite reverse; }
    .mv-ring-3 { width: 190px; height: 190px; top: 14%; right: 12%; animation: spin 22s linear infinite; }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* Floating icons */
    .mv-fi {
        position: absolute; width: 46px; height: 46px;
        border-radius: 14px;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(6,182,212,0.14);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.3rem; backdrop-filter: blur(10px);
    }
    .mv-fi:nth-child(1) { top: 13%; right: 13%; animation: fi 7s ease-in-out infinite; }
    .mv-fi:nth-child(2) { top: 38%; left:  6%; animation: fi 9s ease-in-out 1s infinite; }
    .mv-fi:nth-child(3) { bottom: 17%; right: 7%; animation: fi 6s ease-in-out 2s infinite; }
    .mv-fi:nth-child(4) { bottom: 38%; left: 13%; animation: fi 8s ease-in-out 3s infinite; }
    @keyframes fi {
        0%, 100% { transform: translateY(0); }
        50%       { transform: translateY(-14px); }
    }

    /* Visual content */
    .mv-vc { position: relative; z-index: 10; text-align: center; padding: 2rem; max-width: 430px; }

    .mv-logo-wrap {
        width: 88px; height: 88px; border-radius: 26px;
        background: linear-gradient(135deg, var(--mv-cyan), var(--mv-indigo));
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1.5rem;
        animation: logoPulse 4s ease-in-out infinite;
    }
    @keyframes logoPulse {
        0%, 100% { box-shadow: 0 0 30px rgba(6,182,212,0.4), 0 0 60px rgba(6,182,212,0.1); }
        50%       { box-shadow: 0 0 55px rgba(6,182,212,0.65), 0 0 100px rgba(6,182,212,0.2); }
    }

    .mv-vt { font-size: 2.6rem; font-weight: 800; color: #fff; letter-spacing: -0.04em; margin-bottom: 0.4rem; }
    .mv-vt em { font-style: normal; color: var(--mv-cyan); }
    .mv-vtag { font-size: 0.95rem; color: rgba(255,255,255,0.4); line-height: 1.8; margin: 0 auto 2.5rem; }

    /* Stats */
    .mv-stats { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
    .mv-stat {
        padding: 0.9rem 1.25rem;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 14px; backdrop-filter: blur(8px);
        transition: all 0.3s; cursor: default;
    }
    .mv-stat:hover { background: rgba(6,182,212,0.09); border-color: rgba(6,182,212,0.3); transform: translateY(-4px); }
    .mv-sv  { font-size: 1.4rem; font-weight: 800; color: var(--mv-cyan); display: block; }
    .mv-sl  { font-size: 0.7rem; color: rgba(255,255,255,0.35); margin-top: 0.15rem; }

    /* Heartbeat */
    .mv-hb { margin-top: 2.5rem; opacity: 0.35; }
    .hb-path {
        stroke-dasharray: 500; stroke-dashoffset: 500;
        animation: drawHB 2.8s ease-in-out infinite;
    }
    @keyframes drawHB {
        0%   { stroke-dashoffset: 500; opacity: 1; }
        65%  { stroke-dashoffset: 0;   opacity: 1; }
        85%  { stroke-dashoffset: 0;   opacity: 0.4; }
        100% { stroke-dashoffset: 0;   opacity: 0; }
    }

    /* ══ FORM PANEL ══ */
    .mv-fp {
        width: 100%; max-width: 480px;
        min-height: 100vh;
        background: #060e1f;
        border-inline-end: 1px solid rgba(255,255,255,0.05);
        display: flex; flex-direction: column;
        justify-content: center;
        padding: 3rem 2.5rem;
        position: relative; overflow: hidden;
    }
    @media (min-width: 1024px) { .mv-fp { padding: 4rem 3.5rem; } }

    /* Top gradient bar */
    .mv-fp::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: linear-gradient(90deg, var(--mv-cyan), var(--mv-indigo), var(--mv-primary));
    }
    /* Dot texture */
    .mv-fp::after {
        content: ''; position: absolute; inset: 0;
        background-image: radial-gradient(rgba(6,182,212,0.025) 1px, transparent 1px);
        background-size: 28px 28px; pointer-events: none;
    }

    .mv-fi-inner { position: relative; z-index: 10; }

    /* Mobile brand */
    .mv-mob { display: flex; align-items: center; gap: 0.8rem; margin-bottom: 2.5rem; }
    @media (min-width: 1024px) { .mv-mob { display: none; } }
    .mv-mob-icon {
        width: 46px; height: 46px; border-radius: 13px;
        background: linear-gradient(135deg, var(--mv-cyan), var(--mv-indigo));
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 4px 18px rgba(6,182,212,0.4);
    }
    .mv-mob-name { font-size: 1.4rem; font-weight: 800; color: #fff; letter-spacing: -0.02em; }
    .mv-mob-name em { font-style: normal; color: var(--mv-cyan); }

    /* Heading */
    .mv-h2  { font-size: 1.7rem; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 0.4rem; }
    .mv-sub { font-size: 0.88rem; color: rgba(255,255,255,0.38); margin-bottom: 2.5rem; line-height: 1.6; }

    /* ── Filament field overrides ── */
    .fi-fo-field-wrp label, .fi-label {
        color: rgba(255,255,255,0.72) !important;
        font-family: 'Tajawal', sans-serif !important;
        font-weight: 600 !important; font-size: 0.85rem !important;
    }
    .fi-input-wrp { border-radius: 12px !important; }
    .fi-input {
        background: rgba(255,255,255,0.04) !important;
        border: 1px solid rgba(255,255,255,0.09) !important;
        color: #fff !important;
        font-family: 'Tajawal', sans-serif !important;
        border-radius: 12px !important;
        transition: border-color 0.2s, box-shadow 0.2s !important;
        font-size: 0.93rem !important;
    }
    .fi-input:focus {
        background: rgba(6,182,212,0.04) !important;
        border-color: rgba(6,182,212,0.45) !important;
        box-shadow: 0 0 0 3px rgba(6,182,212,0.1) !important;
        outline: none !important;
    }
    .fi-input::placeholder { color: rgba(255,255,255,0.18) !important; }
    .fi-input-wrp-btn { color: rgba(255,255,255,0.4) !important; }
    .fi-checkbox-input {
        border-radius: 6px !important;
        border-color: rgba(255,255,255,0.18) !important;
        background: rgba(255,255,255,0.04) !important;
        accent-color: var(--mv-cyan) !important;
    }

    /* Submit button */
    .fi-btn-color-primary,
    .fi-btn[type="submit"],
    button.fi-btn-color-primary {
        background: linear-gradient(135deg, var(--mv-cyan) 0%, var(--mv-indigo) 100%) !important;
        border: none !important; border-radius: 12px !important;
        font-family: 'Tajawal', sans-serif !important;
        font-weight: 700 !important; font-size: 0.98rem !important;
        color: #fff !important; transition: all 0.3s ease !important;
        box-shadow: 0 4px 18px rgba(6,182,212,0.28) !important;
    }
    .fi-btn-color-primary:hover,
    .fi-btn[type="submit"]:hover {
        box-shadow: 0 6px 28px rgba(6,182,212,0.48) !important;
        transform: translateY(-2px) !important;
    }

    /* Error messages */
    .fi-fo-field-wrp-error-message { color: #f87171 !important; font-family: 'Tajawal', sans-serif !important; font-size: 0.78rem !important; }

    /* Forgot password link */
    .fi-link { color: var(--mv-cyan) !important; font-family: 'Tajawal', sans-serif !important; }

    /* Security badge */
    .mv-badge {
        display: flex; align-items: center; gap: 0.5rem;
        padding: 0.75rem 1rem;
        background: rgba(16,185,129,0.06);
        border: 1px solid rgba(16,185,129,0.14);
        border-radius: 12px; margin-top: 1.5rem;
        color: rgba(16,185,129,0.8); font-size: 0.78rem;
    }
    .mv-pulse {
        width: 8px; height: 8px; border-radius: 50%;
        background: #10b981; flex-shrink: 0;
        animation: mvpulse 2s ease-in-out infinite;
    }
    @keyframes mvpulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(16,185,129,0.5); }
        50%       { box-shadow: 0 0 0 6px rgba(16,185,129,0); }
    }

    /* Footer */
    .mv-foot { margin-top: 1.8rem; text-align: center; font-size: 0.78rem; color: rgba(255,255,255,0.22); }
    .mv-foot a { color: var(--mv-cyan); text-decoration: none; }
    .mv-foot a:hover { opacity: 0.75; }
</style>

<div class="mv-wrap">

    {{-- ══ VISUAL PANEL ══ --}}
    <div class="mv-visual">
        <div class="mv-grid"></div>
        <div class="mv-orb mv-orb-1"></div>
        <div class="mv-orb mv-orb-2"></div>
        <div class="mv-ring mv-ring-1"></div>
        <div class="mv-ring mv-ring-2"></div>
        <div class="mv-ring mv-ring-3"></div>

        <div class="mv-fi">🏥</div>
        <div class="mv-fi">🧬</div>
        <div class="mv-fi">💊</div>
        <div class="mv-fi">🩺</div>

        <div class="mv-vc">
            <div class="mv-logo-wrap">
                <img src="{{ asset('favicon.png') }}" alt="Medvion" style="width:54px;height:54px;border-radius:16px;object-fit:contain;">
            </div>

            <h1 class="mv-vt">Medvion<em>+</em></h1>
            <p class="mv-vtag">{{ __('admin.login.tagline') }}</p>

            <div class="mv-stats">
                <div class="mv-stat">
                    <span class="mv-sv">{{ __('admin.login.stat_courses') }}</span>
                    <div class="mv-sl">{{ __('admin.login.stat_courses_label') }}</div>
                </div>
                <div class="mv-stat">
                    <span class="mv-sv">{{ __('admin.login.stat_trainees') }}</span>
                    <div class="mv-sl">{{ __('admin.login.stat_trainees_label') }}</div>
                </div>
                <div class="mv-stat">
                    <span class="mv-sv">{{ __('admin.login.stat_satisfaction') }}</span>
                    <div class="mv-sl">{{ __('admin.login.stat_satisfaction_label') }}</div>
                </div>
            </div>

            <div class="mv-hb">
                <svg width="300" height="55" viewBox="0 0 300 55" style="overflow:visible">
                    <path class="hb-path"
                        d="M0,27 L55,27 L70,9 L80,45 L95,12 L108,32 L125,27 L300,27"
                        fill="none" stroke="#06b6d4" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- ══ FORM PANEL ══ --}}
    <div class="mv-fp">
        <div class="mv-fi-inner">

            {{-- Mobile brand --}}
            <div class="mv-mob">
                <div class="mv-mob-icon">
                    <img src="{{ asset('favicon.png') }}" alt="M" style="width:28px;height:28px;border-radius:8px;object-fit:contain;">
                </div>
                <span class="mv-mob-name">Medvion<em>+</em></span>
            </div>

            {{-- Heading --}}
            <h2 class="mv-h2">{{ __('admin.login.welcome') }}</h2>
            <p class="mv-sub">{{ __('admin.login.subtitle') }}</p>

            {{-- Filament form (Livewire-wired via $this->content) --}}
            {{ $this->content }}

            {{-- Security badge --}}
            <div class="mv-badge">
                <span class="mv-pulse"></span>
                <svg style="width:13px;height:13px;flex-shrink:0;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                </svg>
                <span>{{ __('admin.login.security') }}</span>
            </div>

            {{-- Footer --}}
            <div class="mv-foot">
                <a href="{{ url('/') }}">{{ __('admin.login.back_to_site') }}</a>
                <div style="margin-top:0.6rem;">
                    {{ __('admin.login.copyright', ['year' => date('Y')]) }}
                </div>
            </div>

        </div>
    </div>

</div>

</x-filament-panels::page.simple>
