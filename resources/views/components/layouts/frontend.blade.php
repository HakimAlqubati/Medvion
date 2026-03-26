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
    <!-- Wrapper to reserve 64px space on inner pages -->
    <div class="{{ request()->is('/') ? 'absolute w-full z-50 pointer-events-none' : 'h-16 w-full' }}">
        <header id="main-header" class="fixed left-0 right-0 z-50 transition-all duration-500 top-4 pointer-events-auto">
            <div id="navbar-container" class="mx-auto bg-white transition-all duration-500 flex justify-between items-center h-16 px-4 sm:px-6 lg:px-8 max-w-5xl rounded-full shadow-lg border border-black/5">

                {{-- Brand --}}
                <a href="{{ url('/') }}" class="text-2xl font-extrabold text-primary tracking-tight flex-shrink-0">
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
                <div class="flex items-center gap-3 flex-shrink-0">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm font-semibold text-primary hover:text-primary-dark transition">
                        {{ __('land.nav_dashboard') }}
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center justify-center px-6 py-2 border-2 border-primary text-primary hover:bg-primary hover:text-white text-sm font-bold rounded-full shadow-sm hover:shadow transition-all duration-300">
                        {{ __('land.nav_login_register') }}
                    </a>
                    @endauth
                    @endif
                </div>

            </div>
        </header>
    </div>

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

                <nav class="flex flex-wrap gap-4 md:gap-6 text-sm text-gray-300 justify-center">
                    <a href="{{ url('/') }}" class="hover:text-white transition whitespace-nowrap">{{ __('land.nav_home') }}</a>
                    <a href="{{ url('/about') }}" class="hover:text-white transition whitespace-nowrap">{{ __('land.nav_about') }}</a>
                    <a href="{{ url('/#courses') }}" class="hover:text-white transition whitespace-nowrap">{{ __('land.nav_courses') }}</a>
                    <a href="{{ route('privacy') }}" class="hover:text-white transition whitespace-nowrap">{{ __('land.nav_privacy') }}</a>
                    <a href="{{ route('terms') }}" class="hover:text-white transition whitespace-nowrap">{{ __('land.nav_terms') }}</a>
                </nav>

            </div>
            <div class="mt-8 border-t border-white/10 pt-6 text-center text-sm text-gray-400">
                {!! __('land.footer_copy', ['year' => date('Y')]) !!}
            </div>
        </div>
    </footer>

    {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/966500000000?text={{ urlencode(__('land.whatsapp_message')) }}" 
       target="_blank" rel="noopener noreferrer"
       class="fixed bottom-8 end-8 z-50 flex items-center justify-center w-14 h-14 bg-primary text-white rounded-full shadow-lg hover:shadow-2xl hover:bg-primary-dark hover:-translate-y-1 transition-all duration-300 group"
       aria-label="{{ __('land.contact_whatsapp') }}">
        
        {{-- Ping animation effect --}}
        <span class="absolute inline-flex w-full h-full rounded-full bg-primary opacity-30 group-hover:animate-ping duration-1000"></span>
        
        {{-- Custom WhatsApp Icon matching theme --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 relative z-10" fill="currentColor" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.347-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.876 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
    </a>

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const header = document.getElementById('main-header');
            const nav = document.getElementById('navbar-container');
            
            const handleScroll = () => {
                if (window.scrollY > 20) {
                    // Scrolled down (normal full width)
                    header.classList.remove('top-4');
                    header.classList.add('top-0');
                    
                    nav.classList.remove('max-w-5xl', 'rounded-full', 'shadow-lg', 'border-black/5');
                    if (!nav.classList.contains('max-w-full')) {
                        nav.classList.add('max-w-full', 'rounded-none', 'shadow-sm', 'border-b', 'border-gray-100');
                    }
                } else {
                    // At top (floating pill)
                    header.classList.add('top-4');
                    header.classList.remove('top-0');
                    
                    if (!nav.classList.contains('max-w-5xl')) {
                        nav.classList.add('max-w-5xl', 'rounded-full', 'shadow-lg', 'border-black/5');
                    }
                    nav.classList.remove('max-w-full', 'rounded-none', 'shadow-sm', 'border-b', 'border-gray-100');
                }
            };

            window.addEventListener('scroll', handleScroll);
            handleScroll(); // Initialize on load
        });
    </script>
</body>

</html>