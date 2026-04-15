<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('register.page_title') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ──────────────────────────────────────────
           Base & Typography
        ────────────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Tajawal', sans-serif;
            background: #030a18;
            min-height: 100vh;
            margin: 0;
        }

        /* ──────────────────────────────────────────
           Layout
        ────────────────────────────────────────── */
        .reg-grid {
            display: grid;
            grid-template-columns: 1fr;
            min-height: 100vh;
        }
        @media (min-width: 1024px) {
            .reg-grid { grid-template-columns: 1fr 1fr; }
        }

        /* ──────────────────────────────────────────
           Left panel (decorative)
        ────────────────────────────────────────── */
        .reg-left {
            background: linear-gradient(135deg, #0F389E 0%, #1A52CE 45%, #0D9488 100%);
            display: none;
            position: relative;
            overflow: hidden;
        }
        @media (min-width: 1024px) { .reg-left { display: flex; } }
        .reg-left-content { position: relative; z-index: 10; }
        .blob-1 {
            position: absolute; width: 500px; height: 500px; border-radius: 50%;
            background: rgba(255,255,255,0.06); top: -150px;
            right: {{ app()->getLocale() === 'ar' ? 'auto' : '-150px' }};
            left: {{ app()->getLocale() === 'ar' ? '-150px' : 'auto' }};
            pointer-events: none;
        }
        .blob-2 {
            position: absolute; width: 300px; height: 300px; border-radius: 50%;
            background: rgba(13,148,136,0.25); bottom: -80px;
            left: {{ app()->getLocale() === 'ar' ? 'auto' : '-80px' }};
            right: {{ app()->getLocale() === 'ar' ? '-80px' : 'auto' }};
            pointer-events: none;
        }
        .benefit-item {
            display: flex; align-items: center; gap: 12px;
            padding: 16px 20px; border-radius: 16px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            backdrop-filter: blur(10px);
            transition: background 0.3s;
        }
        .benefit-item:hover { background: rgba(255,255,255,0.12); }

        /* ──────────────────────────────────────────
           Right panel (form)
        ────────────────────────────────────────── */
        .reg-right {
            background: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            overflow-y: auto;
        }
        .form-card {
            width: 100%;
            max-width: 480px;
        }

        /* ──────────────────────────────────────────
           Progress Steps
        ────────────────────────────────────────── */
        .progress-track {
            display: flex; align-items: center; gap: 0;
            margin-bottom: 36px;
        }
        .step-dot {
            width: 36px; height: 36px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 13px;
            border: 2px solid #e5e7eb;
            background: #f9fafb;
            color: #9ca3af;
            transition: all 0.4s ease;
            position: relative; z-index: 1;
            flex-shrink: 0;
        }
        .step-dot.active {
            border-color: #1A52CE;
            background: #1A52CE;
            color: #fff;
            box-shadow: 0 0 0 6px rgba(26,82,206,0.15);
        }
        .step-dot.done {
            border-color: #0D9488;
            background: #0D9488;
            color: #fff;
        }
        .step-line {
            flex: 1; height: 2px;
            background: #e5e7eb;
            transition: background 0.4s ease;
        }
        .step-line.done { background: #0D9488; }
        .step-label {
            position: absolute; top: 44px; white-space: nowrap;
            font-size: 11px; font-weight: 700; color: #9ca3af;
            transition: color 0.3s;
        }
        .step-dot.active .step-label { color: #1A52CE; }
        .step-dot.done .step-label { color: #0D9488; }

        /* ──────────────────────────────────────────
           Steps Panels
        ────────────────────────────────────────── */
        .step-panel {
            display: none;
            animation: fadeSlideIn 0.35s ease both;
        }
        .step-panel.active { display: block; }
        @keyframes fadeSlideIn {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ──────────────────────────────────────────
           Form Inputs
        ────────────────────────────────────────── */
        .field-group { margin-bottom: 20px; }
        .field-label {
            display: block; font-size: 13px; font-weight: 700;
            color: #374151; margin-bottom: 7px;
        }
        .field-label span.req { color: #ef4444; margin-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 3px; }
        .field-input {
            width: 100%; padding: 12px 16px;
            border: 1.5px solid #e5e7eb; border-radius: 12px;
            font-size: 14px; font-family: 'Tajawal', sans-serif;
            background: #f9fafb; color: #111827;
            transition: all 0.25s ease;
            outline: none;
        }
        .field-input:focus {
            border-color: #1A52CE;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(26,82,206,0.1);
        }
        .field-input.is-error {
            border-color: #ef4444;
            background: #fff5f5;
        }
        .field-input.is-valid {
            border-color: #0D9488;
            background: #f0fdfa;
        }
        .field-error {
            font-size: 12px; color: #ef4444; margin-top: 5px;
            display: none; align-items: center; gap: 4px;
        }
        .field-error.show { display: flex; }

        /* ──────────────────────────────────────────
           Password Strength
        ────────────────────────────────────────── */
        .strength-bars {
            display: flex; gap: 5px; margin-top: 8px;
        }
        .strength-bar {
            flex: 1; height: 4px; border-radius: 99px;
            background: #e5e7eb; transition: background 0.3s;
        }
        .strength-bar.weak   { background: #ef4444; }
        .strength-bar.fair   { background: #f59e0b; }
        .strength-bar.good   { background: #3b82f6; }
        .strength-bar.strong { background: #10b981; }
        .strength-label {
            font-size: 11px; font-weight: 700; margin-top: 4px;
            transition: color 0.3s;
        }

        /* ──────────────────────────────────────────
           Buttons
        ────────────────────────────────────────── */
        .btn-primary {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            width: 100%; padding: 14px 24px;
            background: linear-gradient(135deg, #1A52CE, #0F389E);
            color: #fff; font-weight: 800; font-size: 15px;
            border: none; border-radius: 14px; cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Tajawal', sans-serif;
            box-shadow: 0 4px 20px rgba(26,82,206,0.3);
        }
        .btn-primary:hover:not(:disabled) {
            background: linear-gradient(135deg, #3068E8, #1A52CE);
            box-shadow: 0 6px 28px rgba(26,82,206,0.45);
            transform: translateY(-1px);
        }
        .btn-primary:disabled { opacity: 0.65; cursor: not-allowed; transform: none; }
        .btn-secondary {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 13px 20px;
            background: #f3f4f6; color: #374151;
            font-weight: 700; font-size: 14px;
            border: 1.5px solid #e5e7eb; border-radius: 14px; cursor: pointer;
            transition: all 0.25s;
            font-family: 'Tajawal', sans-serif;
        }
        .btn-secondary:hover { background: #e5e7eb; border-color: #d1d5db; }
        .btn-row { display: flex; gap: 12px; margin-top: 28px; }
        .btn-row .btn-primary { flex: 1; }

        /* ──────────────────────────────────────────
           Logo
        ────────────────────────────────────────── */
        .logo-mark {
            width: 40px; height: 40px; border-radius: 12px;
            background: linear-gradient(135deg, #06b6d4, #6366f1);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 14px rgba(6,182,212,0.35);
        }
        /* ──────────────────────────────────────────
           Alert toasts
        ────────────────────────────────────────── */
        .toast {
            position: fixed; top: 20px;
            left: 50%; transform: translateX(-50%);
            min-width: 300px; max-width: 520px;
            padding: 14px 20px; border-radius: 14px;
            font-size: 14px; font-weight: 600; z-index: 9999;
            display: flex; align-items: center; gap: 10px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            animation: toastIn 0.35s ease both;
        }
        .toast.error   { background: #fef2f2; color: #b91c1c; border: 1px solid #fecaca; }
        .toast.success { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }
        @keyframes toastIn {
            from { opacity: 0; transform: translateX(-50%) translateY(-12px); }
            to   { opacity: 1; transform: translateX(-50%) translateY(0); }
        }

        /* ──────────────────────────────────────────
           Toggle password eye
        ────────────────────────────────────────── */
        .password-wrapper { position: relative; }
        .pw-toggle {
            position: absolute; top: 50%; transform: translateY(-50%);
            {{ app()->getLocale() === 'ar' ? 'left: 14px;' : 'right: 14px;' }}
            cursor: pointer; color: #9ca3af;
            background: none; border: none; padding: 0; line-height: 0;
        }
        .pw-toggle:hover { color: #1A52CE; }
    </style>
</head>
<body>

{{-- Toast container --}}
<div id="toast-container" aria-live="polite"></div>

<div class="reg-grid">

    {{-- ═══════════════ LEFT PANEL ═══════════════ --}}
    <div class="reg-left flex-col items-center justify-center p-14 lg:p-16">
        <div class="blob-1"></div>
        <div class="blob-2"></div>

        <div class="reg-left-content max-w-md w-full flex flex-col gap-10">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="logo-mark">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                </div>
                <span class="text-2xl font-black text-white tracking-tight">Medvion<span style="color:#67e8f9">+</span></span>
            </a>

            {{-- Headline --}}
            <div>
                <h1 class="text-4xl font-extrabold text-white leading-snug mb-5">
                    {{ __('register.welcome_heading') }}
                </h1>
                <p class="text-white/65 text-lg leading-relaxed">
                    {{ __('register.welcome_sub') }}
                </p>
            </div>

            {{-- Benefits --}}
            <div class="flex flex-col gap-4">
                @foreach ([
                    ['land.courses_auth_feature_1', 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['land.courses_auth_feature_2', 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                    ['land.courses_auth_feature_3', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                ] as [$key, $icon])
                <div class="benefit-item">
                    <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <span class="text-white/90 font-semibold text-sm">{{ __($key) }}</span>
                </div>
                @endforeach
            </div>

            {{-- Step overview --}}
            <div class="bg-white/8 border border-white/12 rounded-2xl p-5 text-white/70 text-sm leading-loose font-medium">
                <p class="text-white font-bold mb-3 text-base">{{ __('register.step_of') }} 3 {{ __('register.step_of') == 'of' ? 'Steps' : 'خطوات' }}</p>
                @foreach ([
                    'register.step1_title',
                    'register.step2_title',
                    'register.step3_title',
                ] as $i => $key)
                <div class="flex items-center gap-3 py-1 border-b border-white/8 last:border-0">
                    <span class="w-5 h-5 rounded-full bg-white/15 text-white text-xs font-bold flex items-center justify-center shrink-0">{{ $i+1 }}</span>
                    {{ __($key) }}
                </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- ═══════════════ RIGHT PANEL (FORM) ═══════════════ --}}
    <div class="reg-right">
        <div class="form-card">

            {{-- Mobile logo --}}
            <div class="flex items-center gap-3 mb-8 lg:hidden">
                <div class="logo-mark shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                </div>
                <span class="text-xl font-black text-gray-900">Medvion<span class="text-primary">+</span></span>
            </div>

            {{-- Progress stepper --}}
            <div class="progress-track" id="progress-track" style="margin-bottom: 48px;">
                <div class="step-dot active" id="dot-1" style="position:relative;">
                    <span>1</span>
                    <span class="step-label">{{ __('register.step1_title') }}</span>
                </div>
                <div class="step-line" id="line-1"></div>
                <div class="step-dot" id="dot-2" style="position:relative;">
                    <span>2</span>
                    <span class="step-label">{{ __('register.step2_title') }}</span>
                </div>
                <div class="step-line" id="line-2"></div>
                <div class="step-dot" id="dot-3" style="position:relative;">
                    <span>3</span>
                    <span class="step-label">{{ __('register.step3_title') }}</span>
                </div>
            </div>

            {{-- ════ FORM ════ --}}
            <form id="register-form" method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                {{-- ─── STEP 1 ─────────────────────────────────────────── --}}
                <div class="step-panel active" id="panel-1">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-1">{{ __('register.step1_title') }}</h2>
                    <p class="text-gray-400 text-sm mb-7">{{ __('register.welcome_sub') }}</p>

                    {{-- Name --}}
                    <div class="field-group">
                        <label class="field-label" for="name">
                            {{ __('register.name') }} <span class="req">*</span>
                        </label>
                        <input id="name" name="name" type="text"
                               class="field-input" autocomplete="name"
                               placeholder="{{ __('register.name_placeholder') }}"
                               value="{{ old('name') }}">
                        <div class="field-error" id="err-name">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span id="err-name-text"></span>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="field-group">
                        <label class="field-label" for="email">
                            {{ __('register.email') }} <span class="req">*</span>
                        </label>
                        <input id="email" name="email" type="email"
                               class="field-input" autocomplete="username"
                               placeholder="{{ __('register.email_placeholder') }}"
                               value="{{ old('email') }}">
                        <div class="field-error" id="err-email">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span id="err-email-text"></span>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="field-group">
                        <label class="field-label" for="password">
                            {{ __('register.password') }} <span class="req">*</span>
                        </label>
                        <div class="password-wrapper">
                            <input id="password" name="password" type="password"
                                   class="field-input" autocomplete="new-password"
                                   placeholder="{{ __('register.password_placeholder') }}"
                                   id="password">
                            <button type="button" class="pw-toggle" onclick="togglePw('password', this)" aria-label="Toggle password">
                                <svg id="eye-pw" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                        {{-- Strength meter --}}
                        <div class="strength-bars" id="strength-bars">
                            <div class="strength-bar" id="sb-1"></div>
                            <div class="strength-bar" id="sb-2"></div>
                            <div class="strength-bar" id="sb-3"></div>
                            <div class="strength-bar" id="sb-4"></div>
                        </div>
                        <div class="strength-label text-gray-400" id="strength-label"></div>
                        <div class="field-error" id="err-password">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span id="err-password-text"></span>
                        </div>
                    </div>

                    {{-- Confirm password --}}
                    <div class="field-group">
                        <label class="field-label" for="password_confirmation">
                            {{ __('register.password_confirmation') }} <span class="req">*</span>
                        </label>
                        <div class="password-wrapper">
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                   class="field-input" autocomplete="new-password"
                                   placeholder="{{ __('register.confirm_placeholder') }}">
                            <button type="button" class="pw-toggle" onclick="togglePw('password_confirmation', this)" aria-label="Toggle confirm password">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                        <div class="field-error" id="err-password_confirmation">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span id="err-password_confirmation-text"></span>
                        </div>
                    </div>

                    <div class="btn-row">
                        <button type="button" id="btn-next-1" class="btn-primary" onclick="goNext(1)">
                            {{ __('register.btn_next') }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="{{ app()->getLocale() === 'ar' ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7' }}"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- ─── STEP 2 ─────────────────────────────────────────── --}}
                <div class="step-panel" id="panel-2">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-1">{{ __('register.step2_title') }}</h2>
                    <p class="text-gray-400 text-sm mb-7">{{ __('register.phone_placeholder') }}</p>

                    {{-- Phone --}}
                    <div class="field-group">
                        <label class="field-label" for="phone">
                            {{ __('register.phone') }} <span class="req">*</span>
                        </label>
                        <input id="phone" name="phone" type="tel"
                               class="field-input"
                               placeholder="{{ __('register.phone_placeholder') }}"
                               value="{{ old('phone') }}">
                        <div class="field-error" id="err-phone">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span id="err-phone-text"></span>
                        </div>
                    </div>

                    {{-- City --}}
                    <div class="field-group">
                        <label class="field-label" for="city">
                            {{ __('register.city') }} <span class="req">*</span>
                        </label>
                        <input id="city" name="city" type="text"
                               class="field-input"
                               placeholder="{{ __('register.city_placeholder') }}"
                               value="{{ old('city') }}">
                        <div class="field-error" id="err-city">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span id="err-city-text"></span>
                        </div>
                    </div>

                    {{-- Address (optional) --}}
                    <div class="field-group">
                        <label class="field-label" for="address">
                            {{ __('register.address') }}
                        </label>
                        <input id="address" name="address" type="text"
                               class="field-input"
                               placeholder="{{ __('register.address_placeholder') }}"
                               value="{{ old('address') }}">
                    </div>

                    <div class="btn-row">
                        <button type="button" class="btn-secondary" onclick="goPrev(2)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="{{ app()->getLocale() === 'ar' ? 'M9 5l7 7-7 7' : 'M15 19l-7-7 7-7' }}"/>
                            </svg>
                            {{ __('register.btn_prev') }}
                        </button>
                        <button type="button" id="btn-next-2" class="btn-primary" onclick="goNext(2)">
                            {{ __('register.btn_next') }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="{{ app()->getLocale() === 'ar' ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7' }}"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- ─── STEP 3 ─────────────────────────────────────────── --}}
                <div class="step-panel" id="panel-3">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-1">{{ __('register.step3_title') }}</h2>
                    <p class="text-gray-400 text-sm mb-7">{{ __('register.specialty_placeholder') }}</p>

                    {{-- Specialty --}}
                    <div class="field-group">
                        <label class="field-label" for="specialty">
                            {{ __('register.specialty') }} <span class="req">*</span>
                        </label>
                        <input id="specialty" name="specialty" type="text"
                               class="field-input"
                               placeholder="{{ __('register.specialty_placeholder') }}"
                               value="{{ old('specialty') }}">
                        <div class="field-error" id="err-specialty">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span id="err-specialty-text"></span>
                        </div>
                    </div>

                    {{-- Qualification --}}
                    <div class="field-group">
                        <label class="field-label" for="qualification">
                            {{ __('register.qualification') }} <span class="req">*</span>
                        </label>
                        <input id="qualification" name="qualification" type="text"
                               class="field-input"
                               placeholder="{{ __('register.qualification_placeholder') }}"
                               value="{{ old('qualification') }}">
                        <div class="field-error" id="err-qualification">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span id="err-qualification-text"></span>
                        </div>
                    </div>

                    {{-- Graduation Year --}}
                    <div class="field-group">
                        <label class="field-label" for="graduation_year">
                            {{ __('register.graduation_year') }} <span class="req">*</span>
                        </label>
                        <input id="graduation_year" name="graduation_year" type="number"
                               class="field-input"
                               placeholder="{{ __('register.graduation_year_placeholder') }}"
                               min="1970" max="{{ date('Y') }}"
                               value="{{ old('graduation_year') }}">
                        <div class="field-error" id="err-graduation_year">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span id="err-graduation_year-text"></span>
                        </div>
                    </div>

                    {{-- Workplace (optional) --}}
                    <div class="field-group">
                        <label class="field-label" for="workplace">
                            {{ __('register.workplace') }}
                        </label>
                        <input id="workplace" name="workplace" type="text"
                               class="field-input"
                               placeholder="{{ __('register.workplace_placeholder') }}"
                               value="{{ old('workplace') }}">
                    </div>

                    <div class="btn-row">
                        <button type="button" class="btn-secondary" onclick="goPrev(3)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="{{ app()->getLocale() === 'ar' ? 'M9 5l7 7-7 7' : 'M15 19l-7-7 7-7' }}"/>
                            </svg>
                            {{ __('register.btn_prev') }}
                        </button>
                        <button type="submit" id="btn-submit" class="btn-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            {{ __('register.btn_submit') }}
                        </button>
                    </div>
                </div>

            </form>

            {{-- Already registered --}}
            <p class="text-center text-sm text-gray-400 mt-8">
                {{ __('register.already_registered') }}
                <a href="{{ url('admin/login') }}" class="font-bold text-primary hover:text-primary-dark transition">
                    {{ __('register.login_link') }}
                </a>
            </p>

        </div>
    </div>
</div>

{{-- ═══════════════════ JAVASCRIPT ═══════════════════ --}}
<script>
(function () {
    'use strict';

    const CSRF  = document.querySelector('meta[name="csrf-token"]').content;
    const STEPS = 3;
    let   current = 1;

    /* ── Password strength ────────────────────────────── */
    const pwLabels = {
        weak:   '{{ __("register.strength_weak") }}',
        fair:   '{{ __("register.strength_fair") }}',
        good:   '{{ __("register.strength_good") }}',
        strong: '{{ __("register.strength_strong") }}',
    };
    const pwColors = { weak:'#ef4444', fair:'#f59e0b', good:'#3b82f6', strong:'#10b981' };

    document.getElementById('password').addEventListener('input', function () {
        const val = this.value;
        let score = 0;
        if (val.length >= 8) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;

        const levels = ['', 'weak', 'fair', 'good', 'strong'];
        const level  = score > 0 ? levels[score] : '';

        for (let i = 1; i <= 4; i++) {
            const bar = document.getElementById('sb-' + i);
            bar.className = 'strength-bar';
            if (level && i <= score) bar.classList.add(level);
        }
        const lbl = document.getElementById('strength-label');
        lbl.textContent = level ? pwLabels[level] : '';
        lbl.style.color = level ? pwColors[level] : '#9ca3af';
    });

    /* ── Toggle password visibility ──────────────────── */
    window.togglePw = function (fieldId, btn) {
        const inp = document.getElementById(fieldId);
        inp.type = inp.type === 'password' ? 'text' : 'password';
    };

    /* ── Show / hide field error ──────────────────────── */
    function setError(field, msg) {
        const wrap = document.getElementById('err-' + field);
        const txt  = document.getElementById('err-' + field + '-text');
        const inp  = document.getElementById(field);
        if (!wrap) return;
        if (msg) {
            txt.textContent = msg;
            wrap.classList.add('show');
            inp && inp.classList.add('is-error');
            inp && inp.classList.remove('is-valid');
        } else {
            wrap.classList.remove('show');
            inp && inp.classList.remove('is-error');
        }
    }

    function clearStepErrors(step) {
        const fields = {
            1: ['name','email','password','password_confirmation'],
            2: ['phone','city'],
            3: ['specialty','qualification','graduation_year'],
        }[step] || [];
        fields.forEach(f => setError(f, null));
    }

    /* ── Collect form data ────────────────────────────── */
    function collectStep(step) {
        const names = {
            1: ['name','email','password','password_confirmation'],
            2: ['phone','city','address'],
            3: ['specialty','qualification','graduation_year','workplace'],
        }[step] || [];
        const body = new FormData();
        body.append('_token', CSRF);
        names.forEach(n => {
            const el = document.getElementById(n);
            if (el) body.append(n, el.value);
        });
        return body;
    }

    /* ── Update step UI ───────────────────────────────── */
    function updateStepper(active) {
        for (let s = 1; s <= STEPS; s++) {
            const dot  = document.getElementById('dot-' + s);
            dot.classList.remove('active', 'done');
            if (s < active)      dot.classList.add('done');
            else if (s === active) dot.classList.add('active');
            if (s < STEPS) {
                const line = document.getElementById('line-' + s);
                line.classList.toggle('done', s < active);
            }
        }
    }

    function showPanel(step) {
        document.querySelectorAll('.step-panel').forEach((p, i) => {
            p.classList.toggle('active', i + 1 === step);
        });
        updateStepper(step);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    /* ── Toast ────────────────────────────────────────── */
    function showToast(msg, type = 'error') {
        const tc = document.getElementById('toast-container');
        const t  = document.createElement('div');
        t.className = 'toast ' + type;
        t.innerHTML = `<svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="${type === 'error' ? 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z' : 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z'}" clip-rule="evenodd"/></svg><span>${msg}</span>`;
        tc.appendChild(t);
        setTimeout(() => t.remove(), 4500);
    }

    /* ── AJAX step validation ─────────────────────────── */
    async function validateStepAjax(step) {
        const btn = document.getElementById('btn-next-' + step);
        if (btn) { btn.disabled = true; }

        clearStepErrors(step);

        try {
            const res = await fetch(`/register/validate-step/${step}`, {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': CSRF },
                body: collectStep(step),
            });

            const data = await res.json();

            if (res.ok && data.valid) {
                return true;
            }

            // 422 validation errors
            if (res.status === 422 && data.errors) {
                Object.entries(data.errors).forEach(([field, msgs]) => {
                    setError(field, msgs[0]);
                });
                showToast(Object.values(data.errors).flat()[0]);
            } else {
                showToast(data.message || '');
            }
            return false;

        } catch (e) {
            showToast('Network error. Please try again.');
            return false;
        } finally {
            if (btn) { btn.disabled = false; }
        }
    }

    /* ── Public step navigation ───────────────────────── */
    window.goNext = async function (step) {
        const valid = await validateStepAjax(step);
        if (valid) {
            current = step + 1;
            showPanel(current);
        }
    };

    window.goPrev = function (step) {
        current = step - 1;
        showPanel(current);
    };

    /* ── Final submit ─────────────────────────────────── */
    document.getElementById('register-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const submitBtn = document.getElementById('btn-submit');
        submitBtn.disabled = true;
        submitBtn.innerHTML = `<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>{{ __("register.btn_submitting") }}`;

        try {
            const formData = new FormData(this);
            const res = await fetch(this.action, {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': CSRF },
                body: formData,
            });

            const data = await res.json();

            if (res.ok && data.redirect) {
                window.location.href = data.redirect;
                return;
            }

            if (res.status === 422 && data.errors) {
                // Find which step the first error belongs to and go there
                const step1Fields = ['name','email','password','password_confirmation'];
                const step2Fields = ['phone','city','address'];
                const firstErrorField = Object.keys(data.errors)[0];

                let targetStep = 3;
                if (step1Fields.includes(firstErrorField)) targetStep = 1;
                else if (step2Fields.includes(firstErrorField)) targetStep = 2;

                current = targetStep;
                showPanel(current);

                Object.entries(data.errors).forEach(([field, msgs]) => setError(field, msgs[0]));
                showToast(Object.values(data.errors).flat()[0]);
            }

        } catch (e) {
            showToast('Network error. Please try again.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>{{ __("register.btn_submit") }}`;
        }
    });

})();
</script>

</body>
</html>
