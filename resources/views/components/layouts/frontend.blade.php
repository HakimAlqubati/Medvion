<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ __('land.meta_description') }}">
    <title>{{ $title ?? __('land.title') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }

        /* --- Cinematic Scroll Reveal --- */
        .reveal-wrap { perspective: 1200px; }

        .reveal {
            opacity: 0;
            transform: translateY(130px) scale(0.82) rotateX(8deg);
            filter: blur(10px);
            transform-origin: center bottom;
            transition:
                opacity  1.1s cubic-bezier(0.16, 1, 0.3, 1),
                transform 1.1s cubic-bezier(0.16, 1, 0.3, 1),
                filter   0.9s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity, filter;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0) scale(1) rotateX(0deg);
            filter: blur(0px);
        }

        /* Stagger delays — more spread for dramatic cascade */
        .delay-100 { transition-delay: 150ms; }
        .delay-200 { transition-delay: 300ms; }
        .delay-300 { transition-delay: 450ms; }

        /* --- Footer Nav Links Animation --- */
        .footer-link {
            opacity: 0;
            transform: translateY(150px) scale(0.75);
            filter: blur(8px);
            transition:
                opacity   0.7s cubic-bezier(0.16, 1, 0.3, 1),
                transform 0.7s cubic-bezier(0.16, 1, 0.3, 1),
                filter    0.55s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity, filter;
        }
        .footer-link.footer-visible {
            opacity: 1;
            transform: translateY(0) scale(1);
            filter: blur(0);
        }

        /* --- WhatsApp Auto Ping --- */
        @keyframes waPing {
            0%           { transform: scale(1);   opacity: 0.4; }
            8%           { transform: scale(2);   opacity: 0;   }
            9%, 100%     { transform: scale(1);   opacity: 0;   }
        }
        .wa-auto-ping {
            animation: waPing 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800 antialiased relative overflow-x-hidden">

    {{-- Page Loader (Medical Theme – Inline Styles for guaranteed rendering) --}}
    <div id="medvion-loader" style="
        position: fixed; inset: 0; z-index: 99999;
        background: #ffffff;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        transition: opacity 0.7s ease-in-out;
        pointer-events: none;
    ">
        <div style="position: relative; width: 64px; height: 64px; margin-bottom: 16px;">
            {{-- Static Ring --}}
            <div style="position: absolute; inset: 0; border: 4px solid rgba(10,74,123,0.12); border-radius: 50%;"></div>
            {{-- Spinning Ring --}}
            <div id="loader-spinner" style="
                position: absolute; inset: 0;
                border: 4px solid transparent;
                border-top-color: #0D9488;
                border-right-color: #0A4A7B;
                border-radius: 50%;
                animation: medvion-spin 1.1s linear infinite;
            "></div>
            {{-- Center Medical Cross --}}
            <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; color: #0A4A7B; animation: medvion-pulse 1.5s ease-in-out infinite;">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
        </div>
        {{-- Brand Name --}}
        <div style="color: #0A4A7B; font-weight: 700; letter-spacing: 0.2em; font-size: 14px; animation: medvion-pulse 1.5s ease-in-out infinite;">
            MEDVION
        </div>

        <style>
            @keyframes medvion-spin  { to { transform: rotate(360deg); } }
            @keyframes medvion-pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.45; } }
        </style>
    </div>
    @php
        $navLinks = [
            ['name' => __('land.nav_home'), 'url' => url('/'), 'active' => request()->is('/'), 'target' => null],
            ['name' => __('land.nav_about'), 'url' => url('/#about'), 'active' => false, 'target' => 'about'],
            ['name' => __('land.nav_courses'), 'url' => url('/#courses'), 'active' => false, 'target' => 'courses'],
            ['name' => __('land.nav_faq'), 'url' => url('/#faq'), 'active' => false, 'target' => 'faq'],
            ['name' => __('land.nav_contact'), 'url' => route('contact'), 'active' => request()->routeIs('contact'), 'target' => null],
        ];
    @endphp

    {{-- ========== NAVBAR ========== --}}
    <!-- Absolute wrapper so the navbar floats over page content -->
    <div class="absolute w-full z-50 pointer-events-none">
        <header id="main-header" data-scrolled="false" class="fixed left-0 right-0 z-50 transition-all duration-500 top-4 data-[scrolled=true]:top-0 pointer-events-auto group">
            <div id="navbar-container" class="mx-auto bg-white transition-all duration-500 flex justify-between items-center h-16 px-4 sm:px-6 lg:px-8 max-w-5xl rounded-full shadow-lg border border-black/5 group-data-[scrolled=true]:max-w-full group-data-[scrolled=true]:rounded-none group-data-[scrolled=true]:shadow-sm group-data-[scrolled=true]:border-transparent group-data-[scrolled=true]:border-b-gray-100">

                {{-- Brand --}}
                <a href="{{ url('/') }}" aria-label="Medvion Home" class="text-2xl font-extrabold text-primary tracking-tight flex-shrink-0 focus:outline-none focus:ring-2 focus:ring-primary rounded-lg px-2">
                    Medvion<span class="text-secondary">+</span>
                </a>

                {{-- Desktop Nav --}}
                <nav class="hidden md:flex items-center gap-6 text-sm font-medium" aria-label="Main Navigation">
                    @foreach ($navLinks as $link)
                        <a href="{{ $link['url'] }}" 
                           class="nav-link group/link relative px-2 py-1 transition-all duration-300 hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary rounded-lg active:scale-95 active:text-primary-dark {{ $link['active'] ? 'text-primary font-bold' : 'text-gray-600' }}"
                           @if($link['active']) aria-current="page" @endif
                           @if($link['target']) data-target="{{ $link['target'] }}" @endif>
                            {{ $link['name'] }}
                            <span class="nav-underline absolute bottom-0 left-1/2 h-[2px] bg-primary transition-all duration-300 rounded-full {{ $link['active'] ? 'w-full -translate-x-1/2' : 'w-0 -translate-x-1/2 group-hover/link:w-full' }}"></span>
                        </a>
                    @endforeach
                </nav>

                {{-- Auth Links & Mobile Menu --}}
                <div class="flex items-center gap-2 md:gap-3 flex-shrink-0">
                    
                    {{-- Mobile Menu Button --}}
                    <button id="mobile-menu-btn" 
                            data-open="false"
                            aria-expanded="false" 
                            aria-controls="mobile-menu"
                            aria-label="Toggle navigation menu"
                            class="md:hidden flex items-center justify-center p-2 text-primary hover:bg-gray-100 rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-primary group/btn">
                        {{-- Burger Icon (Shows when closed) --}}
                        <svg class="h-6 w-6 transition-transform duration-300 group-data-[open=true]/btn:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        {{-- Close Icon (Shows when open) --}}
                        <svg class="h-6 w-6 transition-transform duration-300 hidden group-data-[open=true]/btn:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="hidden md:inline-flex text-sm font-semibold text-primary hover:text-primary-dark focus:outline-none focus:ring-2 focus:ring-primary rounded-lg px-2 transition">
                        {{ __('land.nav_dashboard') }}
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="hidden md:inline-flex items-center justify-center px-6 py-2 border-2 border-primary text-primary hover:bg-primary hover:text-white text-sm font-bold rounded-full shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all duration-300">
                        {{ __('land.nav_login_register') }}
                    </a>
                    @endauth
                    @endif
                </div>

            </div>
        </header>

        {{-- Mobile Menu Drawer --}}
        <div id="mobile-menu" 
             role="dialog" 
             aria-modal="true" 
             aria-hidden="true"
             aria-label="Mobile Navigation"
             data-open="false" 
             class="fixed inset-0 z-40 pointer-events-none group/menu md:hidden">
             
            <!-- Overlay Background -->
            <div id="mobile-overlay" aria-hidden="true" class="absolute inset-0 bg-white/95 backdrop-blur-md opacity-0 transition-opacity duration-300 group-data-[open=true]/menu:opacity-100 group-data-[open=true]/menu:pointer-events-auto cursor-pointer"></div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col pt-24 px-6 pb-8 h-full overflow-y-auto opacity-0 translate-y-4 transition-all duration-300 group-data-[open=true]/menu:opacity-100 group-data-[open=true]/menu:translate-y-0 group-data-[open=true]/menu:pointer-events-auto">
                <nav class="flex flex-col gap-5 text-xl font-bold mt-6 text-center max-w-sm mx-auto w-full">
                    @foreach ($navLinks as $link)
                        <a href="{{ $link['url'] }}" 
                           class="mobile-link text-gray-800 hover:text-primary transition-colors border-b border-gray-100 pb-4 focus:outline-none focus:ring-2 focus:ring-primary rounded-lg px-4 {{ $link['active'] ? 'text-primary' : '' }}"
                           @if($link['active']) aria-current="page" @endif
                           @if($link['target']) data-target="{{ $link['target'] }}" @endif>
                           {{ $link['name'] }}
                        </a>
                    @endforeach

                    {{-- Auth Links on Mobile --}}
                    @if (Route::has('login'))
                    <div class="mt-4 flex justify-center w-full">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="mobile-link inline-flex items-center justify-center w-full px-8 py-3 bg-primary text-white font-bold rounded-full shadow-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all duration-300">{{ __('land.nav_dashboard') }}</a>
                        @else
                        <a href="{{ route('login') }}" class="mobile-link inline-flex items-center justify-center w-full px-8 py-3 bg-primary text-white font-bold rounded-full shadow-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all duration-300">{{ __('land.nav_login_register') }}</a>
                        @endauth
                    </div>
                    @endif
                </nav>
            </div>
        </div>
    </div>

    {{-- ========== MAIN CONTENT ========== --}}
    <main>
        {{ $slot }}
    </main>

    {{-- ========== FOOTER ========== --}}
    <footer class="bg-primary-dark text-white pt-16 pb-8 mt-16 border-t-[6px] border-secondary relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-secondary/10 blur-[100px] rounded-full pointer-events-none -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-primary/20 blur-[80px] rounded-full pointer-events-none translate-y-1/2 -translate-x-1/2"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-8 mb-12">

                {{-- Column 1: Brand & Contact Info --}}
                <div class="md:col-span-5 lg:col-span-4 flex flex-col items-center md:items-start text-center md:text-start">
                    <a href="{{ url('/') }}" class="inline-block text-3xl font-extrabold tracking-tight mb-4 focus:outline-none">
                        Medvion<span class="text-secondary">+</span>
                    </a>
                    <p class="text-gray-400 text-sm leading-relaxed mb-8 max-w-sm">{{ __('land.footer_tagline') }}</p>
                    
                    <div class="flex flex-col gap-4 w-full max-w-xs mx-auto md:mx-0">
                        {{-- Email --}}
                        <a href="mailto:hello@medvion.com" data-index="0" class="footer-link group flex items-center gap-4 bg-white/5 border border-white/10 p-3 rounded-2xl hover:bg-white/10 hover:border-white/20 hover:-translate-y-1 transition-all duration-300 w-full rtl:flex-row-reverse shadow-sm">
                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-white group-hover:bg-secondary group-hover:scale-110 group-hover:shadow-lg transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex flex-col text-start overflow-hidden">
                                <span class="text-xs text-white/50 uppercase tracking-widest font-semibold mb-0.5 whitespace-nowrap">{{ __('land.footer_email_desc') }}</span>
                                <span class="text-sm font-bold font-mono text-white/90 truncate">hello@medvion.com</span>
                            </div>
                        </a>
                        
                        {{-- WhatsApp --}}
                        <a href="https://wa.me/1234567890" target="_blank" data-index="1" class="footer-link group flex items-center gap-4 bg-white/5 border border-white/10 p-3 rounded-2xl hover:bg-white/10 hover:border-white/20 hover:-translate-y-1 transition-all duration-300 w-full rtl:flex-row-reverse shadow-sm">
                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-white group-hover:bg-[#25D366] group-hover:scale-110 group-hover:shadow-[0_0_15px_rgba(37,211,102,0.5)] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <div class="flex flex-col text-start overflow-hidden">
                                <span class="text-xs text-white/50 uppercase tracking-widest font-semibold mb-0.5">{{ __('land.footer_whatsapp_desc') }}</span>
                                <span class="text-sm font-bold font-mono text-white/90" dir="ltr">+966 50 000 0000</span>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Column 2: Quick Links --}}
                <div class="md:col-span-3 lg:col-span-4 flex flex-col items-center flex-1 justify-center relative">
                    <h3 class="text-white font-bold text-lg mb-6 decoration-secondary decoration-2 underline-offset-8 underline text-center">{{ __('land.footer_quick_links') }}</h3>
                    <nav class="flex flex-col gap-4 text-sm font-medium text-gray-400 text-center w-max" id="footer-nav">
                        <a href="{{ url('/') }}"       data-index="2" class="footer-link hover:text-secondary hover:translate-x-1 rtl:hover:-translate-x-1 transition-all">{{ __('land.nav_home') }}</a>
                        <a href="{{ url('/#about') }}"  data-index="3" class="footer-link hover:text-secondary hover:translate-x-1 rtl:hover:-translate-x-1 transition-all">{{ __('land.nav_about') }}</a>
                        <a href="{{ url('/#courses') }}" data-index="4" class="footer-link hover:text-secondary hover:translate-x-1 rtl:hover:-translate-x-1 transition-all">{{ __('land.nav_courses') }}</a>
                        <a href="{{ route('privacy') }}" data-index="5" class="footer-link hover:text-secondary hover:translate-x-1 rtl:hover:-translate-x-1 transition-all">{{ __('land.nav_privacy') }}</a>
                        <a href="{{ route('terms') }}"   data-index="6" class="footer-link hover:text-secondary hover:translate-x-1 rtl:hover:-translate-x-1 transition-all">{{ __('land.nav_terms') }}</a>
                    </nav>
                </div>

                {{-- Column 3: Social Media --}}
                <div class="md:col-span-4 lg:col-span-4 flex flex-col items-center md:items-end justify-center h-full pt-6 md:pt-0">
                    <h3 class="text-white font-bold text-lg mb-6 decoration-secondary decoration-2 underline-offset-8 underline text-center md:text-end w-max">{{ __('land.footer_social_media') }}</h3>
                    <div class="flex gap-4">
                        {{-- Facebook --}}
                        <a href="#" data-index="7" class="footer-link w-12 h-12 rounded-full border border-white/20 bg-white/5 flex items-center justify-center text-white/80 hover:text-white hover:bg-[#1877F2] hover:border-[#1877F2] hover:shadow-lg hover:-translate-y-1 transition-all duration-300" aria-label="Facebook">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                        {{-- Twitter / X --}}
                        <a href="#" data-index="8" class="footer-link w-12 h-12 rounded-full border border-white/20 bg-white/5 flex items-center justify-center text-white/80 hover:text-white hover:bg-black hover:border-black hover:shadow-lg hover:-translate-y-1 transition-all duration-300" aria-label="X (Twitter)">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        {{-- Instagram --}}
                        <a href="#" data-index="9" class="footer-link w-12 h-12 rounded-full border border-white/20 bg-white/5 flex items-center justify-center text-white/80 hover:text-white hover:bg-gradient-to-tr hover:from-yellow-500 hover:via-pink-500 hover:to-purple-500 hover:border-transparent hover:shadow-lg hover:-translate-y-1 transition-all duration-300" aria-label="Instagram">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        {{-- LinkedIn --}}
                        <a href="#" data-index="10" class="footer-link w-12 h-12 rounded-full border border-white/20 bg-white/5 flex items-center justify-center text-white/80 hover:text-white hover:bg-[#0077b5] hover:border-[#0077b5] hover:shadow-lg hover:-translate-y-1 transition-all duration-300" aria-label="LinkedIn">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                        </a>
                    </div>
                </div>

            </div>

            <div class="relative border-t border-white/10 pt-8 pb-4 text-center text-sm text-gray-400">
                {!! __('land.footer_copy', ['year' => date('Y')]) !!}
            </div>
        </div>
    </footer>

    {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/966500000000?text={{ urlencode(__('land.whatsapp_message')) }}" 
       target="_blank" rel="noopener noreferrer"
       class="fixed bottom-8 end-8 z-50 flex items-center justify-center w-14 h-14 bg-primary text-white rounded-full shadow-lg hover:shadow-2xl hover:bg-primary-dark hover:-translate-y-1 transition-all duration-300 group"
       aria-label="{{ __('land.contact_whatsapp') }}">
        {{-- Auto-ping ring --}}
        <span class="wa-auto-ping absolute inline-flex w-full h-full rounded-full bg-primary"></span>
        {{-- Custom WhatsApp Icon matching theme --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 relative z-10" fill="currentColor" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.347-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.876 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
    </a>

    {{-- Scroll To Top Button --}}
    <button
        id="scroll-top-btn"
        onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        aria-label="العودة لأعلى الصفحة"
        class="fixed bottom-28 end-8 z-50 flex items-center justify-center w-12 h-12 rounded-full shadow-lg transition-all duration-500 group bg-secondary hover:bg-secondary-dark"
        style="opacity: 0; transform: translateY(20px) scale(0.8); pointer-events: none;">
        {{-- Bouncing arrow --}}
        <svg class="w-5 h-5 text-white relative z-10 transition-transform duration-300 group-hover:-translate-y-1"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
        {{-- Glow ring on hover --}}
        <span class="absolute inset-0 rounded-full bg-secondary-light opacity-0 group-hover:opacity-30 transition-opacity duration-300 blur-sm"></span>
    </button>

    <style>
        #scroll-top-btn.stt-visible {
            opacity: 1 !important;
            transform: translateY(0) scale(1) !important;
            pointer-events: auto !important;
        }
    </style>
    <script>
        (function () {
            const btn = document.getElementById('scroll-top-btn');
            if (!btn) return;
            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(function () {
                        if (window.scrollY > 300) {
                            btn.classList.add('stt-visible');
                        } else {
                            btn.classList.remove('stt-visible');
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
        })();
    </script>

    @stack('scripts')
    <script>
        // --- Prevent body scroll before load ---
        document.body.style.overflow = 'hidden';

        // --- Page Loader: wait for standard DOM and assets load ---
        window.addEventListener('load', () => {
            const loader = document.getElementById('medvion-loader');
            if (loader) {
                loader.style.opacity = '0';
                document.body.style.overflow = '';
                setTimeout(() => loader.remove(), 700);
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const header = document.getElementById('main-header');
            const mobileBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('mobile-overlay');
            const mobileLinks = document.querySelectorAll('.mobile-link');
            
            // --- Scroll Handling via Data Attribute ---
            const handleScroll = () => {
                const isScrolled = window.scrollY > 20;
                if(header.getAttribute('data-scrolled') !== String(isScrolled)) {
                    header.setAttribute('data-scrolled', isScrolled);
                }
            };
            window.addEventListener('scroll', handleScroll, { passive: true });
            handleScroll();

            // --- Mobile Menu A11y & Toggle ---
            const openMenu = () => {
                mobileMenu.setAttribute('data-open', 'true');
                mobileMenu.setAttribute('aria-hidden', 'false');
                mobileBtn.setAttribute('data-open', 'true');
                mobileBtn.setAttribute('aria-expanded', 'true');
                document.body.style.overflow = 'hidden'; // Scroll lock
                
                // Focus trap enhancement - focus first link slightly delayed
                const firstLink = mobileMenu.querySelector('a');
                if(firstLink) setTimeout(() => firstLink.focus(), 300);
            };

            const closeMenu = () => {
                mobileMenu.setAttribute('data-open', 'false');
                mobileMenu.setAttribute('aria-hidden', 'true');
                mobileBtn.setAttribute('data-open', 'false');
                mobileBtn.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = ''; // Release scroll
                mobileBtn.focus();
            };

            const toggleMenu = () => {
                if (mobileMenu.getAttribute('data-open') === 'true') {
                    closeMenu();
                } else {
                    openMenu();
                }
            };

            if (mobileBtn) mobileBtn.addEventListener('click', toggleMenu);
            if (overlay) overlay.addEventListener('click', closeMenu);

            mobileLinks.forEach(link => {
                link.addEventListener('click', closeMenu);
            });

            // Close on Escape
            window.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && mobileMenu.getAttribute('data-open') === 'true') {
                    closeMenu();
                }
            });

            // Close on Resize (if transitions to desktop)
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768 && mobileMenu.getAttribute('data-open') === 'true') {
                    closeMenu();
                }
            });

            // --- Scroll Reveal Animations (re-triggers every time) ---
            const revealElements = document.querySelectorAll('.reveal');
            if (revealElements.length > 0) {
                const revealObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                        } else {
                            // إزالة الكلاس عند الخروج من نطاق الرؤية لإعادة الانيميشن
                            entry.target.classList.remove('active');
                        }
                    });
                }, { rootMargin: '0px 0px -50px 0px' });

                revealElements.forEach(el => revealObserver.observe(el));
            }

            // --- Active Hash Detection via IntersectionObserver ---
            const isHomePage = document.getElementById('hero-root') !== null;
            if (isHomePage) {
                const spyTargets = document.querySelectorAll('section[id]');
                if(spyTargets.length > 0) {
                    const observer = new IntersectionObserver((entries) => {
                        let activeId = null;
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                activeId = entry.target.id;
                            }
                        });

                        if (activeId) {
                            document.querySelectorAll('a[data-target]').forEach(link => {
                                const target = link.getAttribute('data-target');
                                const underline = link.querySelector('.nav-underline');
                                
                                if (target === activeId) {
                                    link.classList.add('text-primary', 'font-bold');
                                    link.classList.remove('text-gray-600');
                                    if(underline) underline.classList.replace('w-0', 'w-full');
                                } else {
                                    link.classList.remove('text-primary', 'font-bold');
                                    link.classList.add('text-gray-600');
                                    if(underline) underline.classList.replace('w-full', 'w-0');
                                }
                            });
                        }
                    }, { rootMargin: '-20% 0px -60% 0px' });
                    
                    spyTargets.forEach(el => observer.observe(el));
                }
            }

            // --- Footer Nav Animation ---
            const footerSection = document.querySelector('footer');
            if (footerSection) {
                var footerTimers = [];
                const footerObserver = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        const links = footerSection.querySelectorAll('.footer-link');
                        if (entry.isIntersecting) {
                            footerTimers.forEach(clearTimeout);
                            footerTimers = [];
                            // reset instantly
                            links.forEach(function (link) {
                                link.style.transition = 'none';
                                link.classList.remove('footer-visible');
                            });
                            void footerSection.offsetHeight;
                            // stagger in
                            links.forEach(function (link) {
                                link.style.transition = '';
                                const idx = parseInt(link.getAttribute('data-index')) || 0;
                                const t = setTimeout(function () {
                                    link.classList.add('footer-visible');
                                }, idx * 110 + 80);
                                footerTimers.push(t);
                            });
                        } else {
                            // reset when footer leaves view
                            footerTimers.forEach(clearTimeout);
                            footerTimers = [];
                            links.forEach(function (link) {
                                link.style.transition = 'none';
                                link.classList.remove('footer-visible');
                            });
                        }
                    });
                }, { threshold: 0.2 });
                footerObserver.observe(footerSection);
            }
        });
    </script>
</body>

</html>