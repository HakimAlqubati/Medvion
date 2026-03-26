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
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

    {{-- ========== NAVBAR ========== --}}
    <header class="bg-white shadow-sm sticky top-0 z-50" style="">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                {{-- Brand --}}
                <a href="{{ url('/') }}" class="text-2xl font-extrabold text-primary tracking-tight">
                    Medvion<span class="text-secondary">+</span>
                </a>

                {{-- Desktop Nav --}}
                <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                    <a href="{{ url('/') }}" class="group relative px-2 py-1 transition-all duration-300 hover:text-primary active:scale-95 active:text-primary-dark {{ request()->is('/') ? 'text-primary font-bold' : 'text-gray-600' }}">
                        {{ __('land.nav_home') }}
                        <span class="absolute bottom-0 left-1/2 h-[2px] bg-primary transition-all duration-300 rounded-full {{ request()->is('/') ? 'w-full -translate-x-1/2' : 'w-0 -translate-x-1/2 group-hover:w-full' }}"></span>
                    </a>
                    <a href="{{ url('/about') }}" class="group relative px-2 py-1 transition-all duration-300 hover:text-primary active:scale-95 active:text-primary-dark {{ request()->is('about') ? 'text-primary font-bold' : 'text-gray-600' }}">
                        {{ __('land.nav_about') }}
                        <span class="absolute bottom-0 left-1/2 h-[2px] bg-primary transition-all duration-300 rounded-full {{ request()->is('about') ? 'w-full -translate-x-1/2' : 'w-0 -translate-x-1/2 group-hover:w-full' }}"></span>
                    </a>
                    <a href="{{ url('/#courses') }}" class="group relative px-2 py-1 transition-all duration-300 hover:text-primary active:scale-95 active:text-primary-dark text-gray-600">
                        {{ __('land.nav_courses') }}
                        <span class="absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-primary transition-all duration-300 group-hover:w-full rounded-full"></span>
                    </a>
                    <a href="{{ url('/#faq') }}" class="group relative px-2 py-1 transition-all duration-300 hover:text-primary active:scale-95 active:text-primary-dark text-gray-600">
                        {{ __('land.nav_faq') }}
                        <span class="absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-primary transition-all duration-300 group-hover:w-full rounded-full"></span>
                    </a>
                    <a href="{{ route('contact') }}" class="group relative px-2 py-1 transition-all duration-300 hover:text-primary active:scale-95 active:text-primary-dark {{ request()->routeIs('contact') ? 'text-primary font-bold' : 'text-gray-600' }}">
                        {{ __('land.nav_contact') }}
                        <span class="absolute bottom-0 left-1/2 h-[2px] bg-primary transition-all duration-300 rounded-full {{ request()->routeIs('contact') ? 'w-full -translate-x-1/2' : 'w-0 -translate-x-1/2 group-hover:w-full' }}"></span>
                    </a>
                </nav>

                {{-- Auth Links --}}
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm font-semibold text-primary hover:text-primary-dark transition">
                        {{ __('land.nav_dashboard') }}
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-medium text-gray-600 hover:text-primary transition">
                        {{ __('land.nav_login') }}
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center px-4 py-2 bg-primary text-white text-xs font-bold rounded-md hover:bg-primary-light transition shadow-sm">
                        {{ __('land.nav_register') }}
                    </a>
                    @endif
                    @endauth
                    @endif
                </div>

            </div>
        </div>
    </header>

    {{-- ========== MAIN CONTENT ========== --}}
    <main>
        {{ $slot }}
    </main>

    {{-- ========== FOOTER ========== --}}
    <footer class="bg-primary-dark text-white py-10 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                <div>
                    <p class="text-2xl font-extrabold tracking-tight">
                        Medvion<span class="text-secondary">+</span>
                    </p>
                    <p class="text-gray-400 text-sm mt-1">{{ __('land.footer_tagline') }}</p>
                </div>

                <nav class="flex gap-6 text-sm text-gray-300">
                    <a href="{{ url('/') }}" class="hover:text-white transition">{{ __('land.nav_home') }}</a>
                    <a href="{{ url('/about') }}" class="hover:text-white transition">{{ __('land.nav_about') }}</a>
                    <a href="#courses" class="hover:text-white transition">{{ __('land.nav_courses') }}</a>
                </nav>

            </div>
            <div class="mt-8 border-t border-white/10 pt-6 text-center text-sm text-gray-400">
                {!! __('land.footer_copy', ['year' => date('Y')]) !!}
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>