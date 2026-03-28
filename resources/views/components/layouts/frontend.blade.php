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

        /* --- Scroll Reveal Animations --- */
        .reveal {
            opacity: 0;
            transform: translateY(120px) scale(0.88);
            transition: opacity 1s cubic-bezier(0.22, 1, 0.36, 1), transform 1s cubic-bezier(0.22, 1, 0.36, 1);
            will-change: transform, opacity;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        .delay-100 { transition-delay: 120ms; }
        .delay-200 { transition-delay: 240ms; }
        .delay-300 { transition-delay: 360ms; }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800 antialiased relative">

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
                    <a href="{{ url('/#about') }}" class="hover:text-white transition whitespace-nowrap">{{ __('land.nav_about') }}</a>
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
        // --- Prevent body scroll before load ---
        document.body.style.overflow = 'hidden';

        // --- Page Loader: minimum display time ---
        const MIN_LOADER_MS = 1000; // الحد الأدنى لوقت عرض اللودر (بالملي ثانية)
        const loaderStart   = Date.now();

        const pageLoaded = new Promise(resolve => window.addEventListener('load', resolve));
        const minTime    = new Promise(resolve => setTimeout(resolve, MIN_LOADER_MS));

        Promise.all([pageLoaded, minTime]).then(() => {
            const loader  = document.getElementById('medvion-loader');
            const elapsed = Date.now() - loaderStart;
            // إذا انتهى الوقت الأدنى بالفعل، اختفاء فوري؛ وإلا انتظر الباقي
            const delay = Math.max(0, MIN_LOADER_MS - elapsed);
            setTimeout(() => {
                if (loader) {
                    loader.style.opacity = '0';
                    document.body.style.overflow = '';
                    setTimeout(() => loader.remove(), 700);
                }
            }, delay);
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
        });
    </script>
</body>

</html>