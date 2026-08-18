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
        text-align: center; padding: 2.5rem;
        max-width: 460px; width: 100%;
        display: flex; flex-direction: column;
        align-items: center; justify-content: center;
    }

    /* Large Logo Hero */
    .mv-logo-hero {
        width: 180px; height: 180px; border-radius: 38px;
        background: #ffffff;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 2.2rem;
        box-shadow: 0 20px 50px rgba(0,0,0,0.25), 0 0 60px rgba(20,184,166,0.3);
        padding: 0px;
        animation: logoFloat 6s ease-in-out infinite;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .mv-logo-hero img {
        width: 100%; height: 100%; object-fit: contain;
    }
    @keyframes logoFloat {
        0%, 100% {
            transform: translateY(0px) scale(1);
            box-shadow: 0 20px 50px rgba(0,0,0,0.25), 0 0 50px rgba(26,82,206,0.35);
        }
        50% {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 28px 65px rgba(0,0,0,0.3), 0 0 75px rgba(20,184,166,0.45);
        }
    }

    .mv-brand-name {
        font-size: 2.8rem; font-weight: 800; color: #fff;
        letter-spacing: -0.03em; margin-bottom: 0.8rem;
        text-shadow: 0 2px 12px rgba(0,0,0,0.2);
    }
    .mv-brand-name span { color: #14B8A6; }

    .mv-tagline {
        font-size: 1.15rem; color: rgba(255,255,255,0.92);
        line-height: 1.8; margin: 0 auto;
        max-width: 380px; font-weight: 500;
        text-shadow: 0 1px 8px rgba(0,0,0,0.15);
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
        background: #ffffff;
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        padding: 5px;
    }
    .mv-mob-name { font-size: 1.4rem; font-weight: 800; color: #fff; letter-spacing: -0.02em; }
    .mv-mob-name span { color: var(--mv-secondary-lt); }

    /* Heading */
    .mv-heading { font-size: 2.1rem; font-weight: 800; color: #fff; letter-spacing: -0.02em; margin-bottom: 0.6rem; }
    .mv-sub     { font-size: 1rem; color: rgba(255,255,255,0.85); margin-bottom: 2.5rem; line-height: 1.6; }

    /* ── Filament Field Overrides (Filament v3 & v4 / Schema & Light/Dark Mode) ── */
    
    /* 1. All Labels (Fields, Checkboxes, Inline Labels) */
    .mv-form-panel label,
    .mv-form-panel label *,
    .mv-form-panel .fi-fo-field-label,
    .mv-form-panel .fi-fo-field-label *,
    .mv-form-panel .fi-fo-field-label-content,
    .mv-form-panel .fi-fo-field-label-content *,
    .mv-form-panel .fi-fo-field-label-ctn,
    .mv-form-panel .fi-fo-field-label-ctn *,
    .mv-form-panel .fi-fo-field-label-col,
    .mv-form-panel .fi-fo-field-label-col *,
    .mv-form-panel .fi-fo-field-wrp label,
    .mv-form-panel .fi-fo-field-wrp-label,
    .mv-form-panel .fi-fo-field-wrp-label *,
    .mv-form-panel .fi-label,
    .mv-form-panel .fi-label *,
    .mv-form-panel .fi-checkbox-label,
    .mv-form-panel .fi-checkbox-label *,
    .mv-form-panel .fi-fo-checkbox label,
    .mv-form-panel .fi-fo-checkbox label *,
    .mv-form-panel [data-field-wrapper] label,
    .mv-form-panel [data-field-wrapper] label *,
    .mv-form-panel [data-field-wrapper] span {
        color: #ffffff !important;
        font-family: 'Tajawal', sans-serif !important;
        font-weight: 700 !important;
        font-size: 0.95rem !important;
        line-height: 1.5 !important;
    }

    /* Required mark (Asterisk) */
    .mv-form-panel .fi-fo-field-label-required-mark,
    .mv-form-panel sup {
        color: #f87171 !important;
        font-weight: bold !important;
        margin-inline-start: 3px !important;
    }

    /* 2. Hints & Helper Text */
    .mv-form-panel .fi-fo-field-hint,
    .mv-form-panel .fi-fo-field-hint *,
    .mv-form-panel .fi-fo-field-wrp-hint,
    .mv-form-panel .fi-fo-field-wrp-hint *,
    .mv-form-panel .fi-fo-field-helper-text,
    .mv-form-panel .fi-fo-field-helper-text *,
    .mv-form-panel .fi-fo-field-wrp-helper-text,
    .mv-form-panel .fi-fo-field-wrp-helper-text * {
        color: rgba(255, 255, 255, 0.7) !important;
        font-family: 'Tajawal', sans-serif !important;
        font-size: 0.82rem !important;
    }

    /* 3. Input Wrapper & Input Container */
    .mv-form-panel .fi-input-wrp {
        background-color: rgba(255, 255, 255, 0.08) !important;
        border: 1.5px solid rgba(255, 255, 255, 0.16) !important;
        border-radius: 12px !important;
        box-shadow: none !important;
        --tw-ring-color: transparent !important;
        --tw-ring-shadow: 0 0 #0000 !important;
        --tw-ring-offset-shadow: 0 0 #0000 !important;
        transition: border-color 0.2s, box-shadow 0.2s, background-color 0.2s !important;
    }
    .mv-form-panel .fi-input-wrp:focus-within {
        background-color: rgba(26, 82, 206, 0.22) !important;
        border-color: rgba(255, 255, 255, 0.65) !important;
        box-shadow: 0 0 0 3px rgba(26, 82, 206, 0.35) !important;
        --tw-ring-color: transparent !important;
    }
    .mv-form-panel .fi-input-wrp.fi-invalid,
    .mv-form-panel .fi-input-wrp.fi-error,
    .mv-form-panel .fi-input-wrp:has(.fi-error) {
        border-color: rgba(248, 113, 113, 0.8) !important;
    }

    /* 4. Input element itself */
    .mv-form-panel .fi-input,
    .mv-form-panel input[type="text"],
    .mv-form-panel input[type="email"],
    .mv-form-panel input[type="password"] {
        background: transparent !important;
        background-color: transparent !important;
        border: none !important;
        color: #ffffff !important;
        font-family: 'Tajawal', sans-serif !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        outline: none !important;
        font-size: 0.98rem !important;
    }
    .mv-form-panel .fi-input:focus,
    .mv-form-panel input:focus {
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
        outline: none !important;
    }
    .mv-form-panel .fi-input::placeholder,
    .mv-form-panel input::placeholder {
        color: rgba(255, 255, 255, 0.45) !important;
    }

    /* 5. Prefix, Suffix, Affix Labels & Icons */
    .mv-form-panel .fi-input-wrp-label,
    .mv-form-panel .fi-input-wrp-prefix,
    .mv-form-panel .fi-input-wrp-prefix *,
    .mv-form-panel .fi-input-wrp-suffix,
    .mv-form-panel .fi-input-wrp-suffix *,
    .mv-form-panel .fi-input-wrp-btn,
    .mv-form-panel .fi-input-wrp button,
    .mv-form-panel .fi-input-wrp svg,
    .mv-form-panel .fi-input-wrp .fi-icon,
    .mv-form-panel .fi-input-wrp .fi-icon-btn {
        color: rgba(255, 255, 255, 0.65) !important;
    }
    .mv-form-panel .fi-input-wrp button:hover,
    .mv-form-panel .fi-input-wrp .fi-icon-btn:hover {
        color: #ffffff !important;
    }

    /* 6. Autofill fix */
    .mv-form-panel .fi-input:-webkit-autofill,
    .mv-form-panel .fi-input:-webkit-autofill:hover,
    .mv-form-panel .fi-input:-webkit-autofill:focus,
    .mv-form-panel .fi-input:-webkit-autofill:active,
    .mv-form-panel input:-webkit-autofill {
        -webkit-text-fill-color: #ffffff !important;
        -webkit-box-shadow: 0 0 0px 1000px #113184 inset !important;
        transition: background-color 5000s ease-in-out 0s !important;
        caret-color: #ffffff !important;
    }

    /* 7. Checkbox & Inline Checkbox */
    .mv-form-panel .fi-checkbox-input,
    .mv-form-panel input[type="checkbox"] {
        border-radius: 6px !important;
        border: 1.5px solid rgba(255, 255, 255, 0.25) !important;
        background-color: rgba(255, 255, 255, 0.08) !important;
        box-shadow: none !important;
        --tw-ring-color: transparent !important;
        --tw-ring-shadow: 0 0 #0000 !important;
        --tw-ring-offset-shadow: 0 0 #0000 !important;
    }
    .mv-form-panel .fi-checkbox-input:checked,
    .mv-form-panel input[type="checkbox"]:checked {
        background-color: var(--mv-primary) !important;
        border-color: var(--mv-primary-lt) !important;
    }
    .mv-form-panel .fi-checkbox-input:focus,
    .mv-form-panel input[type="checkbox"]:focus {
        box-shadow: 0 0 0 2px rgba(26, 82, 206, 0.4) !important;
        --tw-ring-color: transparent !important;
    }

    /* 8. Submit button */
    .mv-form-panel .fi-btn-color-primary,
    .mv-form-panel button.fi-btn-color-primary,
    .mv-form-panel button[type="submit"] {
        background: linear-gradient(135deg, var(--mv-primary), var(--mv-primary-dk)) !important;
        border: none !important;
        border-radius: 12px !important;
        font-family: 'Tajawal', sans-serif !important;
        font-weight: 700 !important;
        font-size: 0.98rem !important;
        color: #ffffff !important;
        transition: all 0.3s ease !important;
        box-shadow: 0 4px 18px rgba(26, 82, 206, 0.3) !important;
    }
    .mv-form-panel .fi-btn-color-primary span,
    .mv-form-panel button[type="submit"] span {
        color: #ffffff !important;
    }
    .mv-form-panel .fi-btn-color-primary:hover,
    .mv-form-panel button[type="submit"]:hover {
        box-shadow: 0 6px 28px rgba(26, 82, 206, 0.5) !important;
        transform: translateY(-2px) !important;
    }

    /* 9. Forgot-password / other links */
    .mv-form-panel .fi-link,
    .mv-form-panel .fi-link span,
    .mv-form-panel a.fi-link,
    .mv-form-panel .fi-fo-field-hint a,
    .mv-form-panel .fi-fo-field-hint a span,
    .mv-form-panel .fi-fo-field-wrp-hint a,
    .mv-form-panel .fi-fo-field-wrp-hint a span {
        color: var(--mv-secondary-lt) !important;
        font-family: 'Tajawal', sans-serif !important;
        font-weight: 600 !important;
        text-decoration: none !important;
        transition: color 0.2s ease !important;
    }
    .mv-form-panel .fi-link:hover,
    .mv-form-panel a.fi-link:hover,
    .mv-form-panel .fi-fo-field-hint a:hover,
    .mv-form-panel .fi-fo-field-wrp-hint a:hover {
        color: #5eead4 !important;
        text-decoration: underline !important;
    }

    /* 10. Validation errors */
    .mv-form-panel .fi-fo-field-wrp-error-message,
    .mv-form-panel .fi-fo-field-wrp-error-message *,
    .mv-form-panel [data-validation-error],
    .mv-form-panel [data-validation-error] * {
        color: #f87171 !important;
        font-family: 'Tajawal', sans-serif !important;
        font-size: 0.82rem !important;
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

            {{-- Large Logo --}}
            <div class="mv-logo-hero">
                <img src="{{ asset('assets/images/medvion-logo.png') }}"
                     alt="Medvion">
            </div>

            {{-- Platform Name --}}
            <h1 class="mv-brand-name">Medvion<span>+</span></h1>

            {{-- Descriptive Tagline --}}
            <p class="mv-tagline">{{ __('admin.login.tagline') }}</p>

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
                    <img src="{{ asset('assets/images/medvion-logo.png') }}"
                         alt="Medvion"
                         style="width:30px;height:30px;object-fit:contain;">
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
