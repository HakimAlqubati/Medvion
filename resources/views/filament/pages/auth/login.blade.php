<x-filament-panels::page.simple>

<style>
    @import url('https://fonts.bunny.net/css?family=tajawal:400,500,700,800&display=swap');

    :root {
        --mv-primary:      #1A52CE;
        --mv-primary-lt:   #3068E8;
        --mv-primary-dk:   #0F389E;
        --mv-secondary:    #0D9488;
        --mv-secondary-lt: #14B8A6;
        --mv-bg:           #0F389E; 
        --mv-surface:      #113184; 
        --mv-border:       rgba(255,255,255,0.12);
    }

    /* ── Reset Filament simple layout to full-viewport ── */
    .fi-simple-main-ctn { padding: 0 !important; max-width: 100vw !important; }
    .fi-simple-main {
        max-width: 100vw !important; width: 100vw !important;
        padding: 0 !important; border-radius: 0 !important;
        box-shadow: none !important; background: transparent !important;
        margin: 0 !important;
    }
    .fi-simple-layout  { background: var(--mv-bg) !important; min-height: 100vh !important; }
    .fi-simple-page    { min-height: 100vh !important; }
    .fi-simple-page-content { padding: 0 !important; margin: 0 !important; }

    /* ── Root layout ── */
    .mv-root {
        display: flex;
        min-height: 100vh;
        font-family: 'Tajawal', sans-serif;
        background: var(--mv-bg);
        direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};
    }

    /* ══════════════════════════════════════════════
       VISUAL PANEL (right in LTR / left in RTL)
    ══════════════════════════════════════════════ */
    .mv-visual {
        flex: 1;
        position: relative;
        overflow: hidden;
        background: linear-gradient(145deg, #0F389E 0%, #1A52CE 55%, #3068E8 100%);
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    @media (min-width: 1024px) { .mv-visual { display: flex; } }

    /* Animated dot grid */
    .mv-grid {
        position: absolute; inset: 0; pointer-events: none;
        background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 1px);
        background-size: 32px 32px;
        animation: gridDrift 28s linear infinite;
    }
    @keyframes gridDrift {
        from { background-position: 0 0; }
        to   { background-position: 32px 32px; }
    }

    /* Glowing ambient orbs */
    .mv-orb { position: absolute; border-radius: 50%; filter: blur(75px); pointer-events: none; }
    .mv-orb-a {
        width: 480px; height: 480px;
        background: radial-gradient(circle, rgba(20,184,166,0.18), transparent 70%);
        top: -12%; {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: -8%;
        animation: orbFloat 12s ease-in-out infinite;
    }
    .mv-orb-b {
        width: 320px; height: 320px;
        background: radial-gradient(circle, rgba(48,104,232,0.25), transparent 70%);
        bottom: -8%; {{ app()->getLocale() === 'ar' ? 'left' : 'right' }}: -6%;
        animation: orbFloat 16s ease-in-out infinite reverse;
    }
    @keyframes orbFloat {
        0%, 100% { transform: translate(0,0) scale(1); }
        50%       { transform: translate(18px,-18px) scale(1.08); }
    }

    /* Decorative rings */
    .mv-ring {
        position: absolute; border-radius: 50%;
        border: 1px solid rgba(26,82,206,0.1);
    }
    .mv-ring-1 { width: 340px; height: 340px; animation: ringSpinF 32s linear infinite; }
    .mv-ring-2 { width: 540px; height: 540px; animation: ringSpinF 52s linear infinite reverse; }
    @keyframes ringSpinF { to { transform: rotate(360deg); } }

    /* Visual content */
    .mv-vc {
        position: relative; z-index: 10;
        text-align: center; padding: 2rem;
        max-width: 400px; width: 100%;
    }

    /* Logo mark */
    .mv-logo-ring {
        width: 90px; height: 90px; border-radius: 28px;
        background: linear-gradient(135deg, var(--mv-primary) 0%, var(--mv-secondary) 100%);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1.6rem;
        box-shadow: 0 0 40px rgba(26,82,206,0.35), 0 0 80px rgba(26,82,206,0.1);
        animation: logoGlow 4s ease-in-out infinite;
    }
    @keyframes logoGlow {
        0%, 100% { box-shadow: 0 0 40px rgba(26,82,206,0.35), 0 0 80px rgba(26,82,206,0.1); }
        50%       { box-shadow: 0 0 60px rgba(26,82,206,0.55), 0 0 120px rgba(26,82,206,0.2); }
    }

    .mv-brand-name {
        font-size: 2.5rem; font-weight: 800; color: #fff;
        letter-spacing: -0.04em; margin-bottom: 0.5rem;
    }
    .mv-brand-name span { color: #14B8A6; }

    .mv-tagline {
        font-size: 0.9rem; color: rgba(255,255,255,0.8);
        line-height: 1.8; margin: 0 auto 2.8rem;
    }

    /* Feature cards (replaced fake stats) */
    .mv-features { display: flex; flex-direction: column; gap: 0.9rem; }
    .mv-feat {
        display: flex; align-items: center;
        gap: {{ app()->getLocale() === 'ar' ? '0' : '14px' }};
        padding: 14px 18px; border-radius: 16px;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.07);
        text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};
        transition: background 0.3s, border-color 0.3s, transform 0.3s;
        gap: 14px;
    }
    .mv-feat:hover {
        background: rgba(26,82,206,0.1);
        border-color: rgba(26,82,206,0.28);
        transform: translateX({{ app()->getLocale() === 'ar' ? '-4px' : '4px' }});
    }
    .mv-feat-icon {
        width: 40px; height: 40px; border-radius: 12px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
    }
    .mv-feat-icon-1 { background: rgba(26,82,206,0.18); }
    .mv-feat-icon-2 { background: rgba(13,148,136,0.18); }
    .mv-feat-icon-3 { background: rgba(99,102,241,0.18); }
    .mv-feat-body { flex: 1; }
    .mv-feat-title { font-size: 1rem; font-weight: 800; color: #fff; }
    .mv-feat-desc  { font-size: 0.85rem; color: rgba(255,255,255,0.8); margin-top: 1px; }

    /* ECG line animation */
    .mv-ecg { margin-top: 2.8rem; opacity: 0.28; }
    .ecg-path {
        stroke-dasharray: 480; stroke-dashoffset: 480;
        animation: ecgDraw 3s ease-in-out infinite;
    }
    @keyframes ecgDraw {
        0%   { stroke-dashoffset: 480; opacity: 1; }
        60%  { stroke-dashoffset: 0; opacity: 1; }
        85%  { stroke-dashoffset: 0; opacity: 0.35; }
        100% { stroke-dashoffset: 0; opacity: 0; }
    }

    /* ══════════════════════════════════════════════
       FORM PANEL
    ══════════════════════════════════════════════ */
    .mv-form-panel {
        width: 100%; max-width: 460px;
        min-height: 100vh;
        background: var(--mv-surface);
        border-inline-end: 1px solid var(--mv-border);
        display: flex; flex-direction: column;
        justify-content: center;
        padding: 3rem 2.5rem;
        position: relative; overflow: hidden;
    }
    @media (min-width: 1024px) { .mv-form-panel { padding: 4rem 3.5rem; } }

    /* Top accent bar */
    .mv-form-panel::before {
        content: '';
        position: absolute; top: 0; inset-inline: 0; height: 3px;
        background: linear-gradient(90deg, var(--mv-primary), var(--mv-secondary));
    }
    /* Subtle dot texture */
    .mv-form-panel::after {
        content: ''; position: absolute; inset: 0; pointer-events: none;
        background-image: radial-gradient(rgba(26,82,206,0.03) 1px, transparent 1px);
        background-size: 26px 26px;
    }

    .mv-form-inner { position: relative; z-index: 10; }

    /* Mobile brand header */
    .mv-mob-brand {
        display: flex; align-items: center; gap: 0.8rem; margin-bottom: 2.5rem;
    }
    @media (min-width: 1024px) { .mv-mob-brand { display: none; } }
    .mv-mob-icon {
        width: 44px; height: 44px; border-radius: 13px; flex-shrink: 0;
        background: linear-gradient(135deg, var(--mv-primary), var(--mv-secondary));
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 4px 16px rgba(26,82,206,0.4);
    }
    .mv-mob-name { font-size: 1.4rem; font-weight: 800; color: #fff; letter-spacing: -0.02em; }
    .mv-mob-name span { color: var(--mv-secondary-lt); }

    /* Heading */
    .mv-heading { font-size: 2.1rem; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 0.6rem; }
    .mv-sub     { font-size: 1rem; color: rgba(255,255,255,0.85); margin-bottom: 2.5rem; line-height: 1.6; }

    /* ── Filament field overrides ── */
    .fi-fo-field-wrp label,
    .fi-label {
        color: #fff !important;
        font-family: 'Tajawal', sans-serif !important;
        font-weight: 800 !important;
        font-size: 1rem !important;
    }
    .fi-input-wrp { border-radius: 12px !important; }
    .fi-input {
        background: rgba(255,255,255,0.04) !important;
        border: 1.5px solid rgba(255,255,255,0.09) !important;
        color: #fff !important;
        font-family: 'Tajawal', sans-serif !important;
        border-radius: 12px !important;
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s !important;
        font-size: 1rem !important;
    }
    .fi-input:focus {
        background: rgba(26,82,206,0.1) !important;
        border-color: rgba(255,255,255,0.6) !important;
        box-shadow: 0 0 0 3px rgba(26,82,206,0.25) !important;
        outline: none !important;
    }
    .fi-input::placeholder { color: rgba(255,255,255,0.5) !important; }
    .fi-input-wrp-btn { color: rgba(255,255,255,0.4) !important; }
    .fi-checkbox-input {
        border-radius: 6px !important;
        border-color: rgba(255,255,255,0.18) !important;
        background: rgba(255,255,255,0.04) !important;
    }
    .fi-checkbox-input:checked { background-color: var(--mv-primary) !important; border-color: var(--mv-primary) !important; }
    .fi-checkbox-label, .fi-checkbox-label span { color: #fff !important; font-weight: 800 !important; font-size: 0.95rem !important; }

    /* Submit button */
    .fi-btn-color-primary,
    button.fi-btn-color-primary {
        background: linear-gradient(135deg, var(--mv-primary), var(--mv-primary-dk)) !important;
        border: none !important; border-radius: 12px !important;
        font-family: 'Tajawal', sans-serif !important;
        font-weight: 700 !important; font-size: 0.98rem !important;
        color: #fff !important;
        transition: all 0.3s ease !important;
        box-shadow: 0 4px 18px rgba(26,82,206,0.3) !important;
    }
    .fi-btn-color-primary:hover { box-shadow: 0 6px 28px rgba(26,82,206,0.5) !important; transform: translateY(-2px) !important; }

    /* Forgot-password / other links */
    .fi-link { color: var(--mv-secondary-lt) !important; font-family: 'Tajawal', sans-serif !important; }

    /* Validation errors */
    .fi-fo-field-wrp-error-message {
        color: #f87171 !important;
        font-family: 'Tajawal', sans-serif !important;
        font-size: 0.78rem !important;
    }

    /* Security badge */
    .mv-badge {
        display: flex; align-items: center; gap: 10px;
        padding: 12px 16px;
        background: rgba(13,148,136,0.15);
        border: 1px solid rgba(13,148,136,0.25);
        border-radius: 12px; margin-top: 1.5rem;
        color: #fff; font-size: 0.78rem;
    }
    .mv-pulse {
        width: 8px; height: 8px; border-radius: 50%;
        background: var(--mv-secondary); flex-shrink: 0;
        animation: dot-pulse 2.2s ease-in-out infinite;
    }
    @keyframes dot-pulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(13,148,136,0.55); }
        50%       { box-shadow: 0 0 0 6px rgba(13,148,136,0); }
    }

    /* Footer */
    .mv-footer {
        margin-top: 1.8rem; text-align: center;
        font-size: 0.77rem; color: rgba(255,255,255,0.5);
        display: flex; flex-direction: column; gap: 6px;
    }
    .mv-footer a { color: #fff; text-decoration: underline; transition: opacity 0.2s; }
    .mv-footer a:hover { opacity: 0.7; }
</style>

<div class="mv-root">

    {{-- ════════════════════════════════════════
         VISUAL PANEL
    ════════════════════════════════════════ --}}
    <div class="mv-visual">
        <div class="mv-grid"></div>
        <div class="mv-orb mv-orb-a"></div>
        <div class="mv-orb mv-orb-b"></div>
        <div class="mv-ring mv-ring-1"></div>
        <div class="mv-ring mv-ring-2"></div>

        <div class="mv-vc">

            {{-- Logo --}}
            <div class="mv-logo-ring">
                <img src="{{ asset('favicon.png') }}"
                     alt="Medvion"
                     style="width:52px;height:52px;border-radius:14px;object-fit:contain;">
            </div>

            <h1 class="mv-brand-name">Medvion<span>+</span></h1>
            <p class="mv-tagline">{{ __('admin.login.tagline') }}</p>

            {{-- Feature cards — no fake numbers ──────────────────── --}}
            <div class="mv-features">

                {{-- Card 1 --}}
                <div class="mv-feat">
                    <div class="mv-feat-icon mv-feat-icon-1">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="rgba(26,82,206,0.9)" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                        </svg>
                    </div>
                    <div class="mv-feat-body">
                        <div class="mv-feat-title">{{ __('admin.login.feature_1_title') }}</div>
                        <div class="mv-feat-desc">{{ __('admin.login.feature_1_desc') }}</div>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="mv-feat">
                    <div class="mv-feat-icon mv-feat-icon-2">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="rgba(13,148,136,0.9)" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                        </svg>
                    </div>
                    <div class="mv-feat-body">
                        <div class="mv-feat-title">{{ __('admin.login.feature_2_title') }}</div>
                        <div class="mv-feat-desc">{{ __('admin.login.feature_2_desc') }}</div>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="mv-feat">
                    <div class="mv-feat-icon mv-feat-icon-3">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="rgba(99,102,241,0.9)" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"/>
                        </svg>
                    </div>
                    <div class="mv-feat-body">
                        <div class="mv-feat-title">{{ __('admin.login.feature_3_title') }}</div>
                        <div class="mv-feat-desc">{{ __('admin.login.feature_3_desc') }}</div>
                    </div>
                </div>

            </div>
            {{-- ────────────────────────────────── --}}

            {{-- ECG decorative line --}}
            <div class="mv-ecg">
                <svg width="280" height="48" viewBox="0 0 280 48" style="overflow:visible;">
                    <path class="ecg-path"
                          d="M0,24 L50,24 L62,8 L73,40 L86,11 L98,28 L115,24 L280,24"
                          fill="none" stroke="#1A52CE" stroke-width="1.6"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

        </div>
    </div>

    {{-- ════════════════════════════════════════
         FORM PANEL
    ════════════════════════════════════════ --}}
    <div class="mv-form-panel">
        <div class="mv-form-inner">

            {{-- Mobile brand (hidden on desktop) --}}
            <div class="mv-mob-brand">
                <div class="mv-mob-icon">
                    <img src="{{ asset('favicon.png') }}"
                         alt="M"
                         style="width:26px;height:26px;border-radius:7px;object-fit:contain;">
                </div>
                <span class="mv-mob-name">Medvion<span>+</span></span>
            </div>

            {{-- Heading --}}
            <h2 class="mv-heading">{{ __('admin.login.welcome') }}</h2>
            <p class="mv-sub">{{ __('admin.login.subtitle') }}</p>

            {{-- Filament login form (Livewire) --}}
            {{ $this->content }}

            {{-- Security indicator --}}
            <div class="mv-badge">
                <div class="mv-pulse"></div>
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="1.8" style="flex-shrink:0;">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                </svg>
                <span>{{ __('admin.login.security') }}</span>
            </div>

            {{-- Footer --}}
            <div class="mv-footer">
                <a href="{{ url('/') }}">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2"
                         style="display:inline;vertical-align:middle;margin-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}:4px;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="{{ app()->getLocale() === 'ar' ? 'M9 5l7 7-7 7' : 'M15 19l-7-7 7-7' }}"/>
                    </svg>
                    {{ __('admin.login.back_to_site') }}
                </a>
                <span>{{ __('admin.login.copyright', ['year' => date('Y')]) }}</span>
            </div>

        </div>
    </div>

</div>

</x-filament-panels::page.simple>
