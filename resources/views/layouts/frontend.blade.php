<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ __('land.meta_description') }}">
    <title>{{ $title ?? __('land.title') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Tajawal', sans-serif; background: #030a18; }
    </style>

    @stack('styles')
</head>

<body class="text-gray-800 antialiased">

    {{-- ========== NAVBAR ========== --}}
    <header
        id="site-header"
        class="fixed top-0 inset-x-0 z-50 transition-all duration-500 navbar-transparent"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                {{-- ── Brand ── --}}
                <a href="{{ url('/') }}" class="flex items-center gap-2.5 group">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-cyan-400 to-indigo-500 flex items-center justify-center shadow-lg shadow-cyan-500/30 group-hover:shadow-cyan-500/50 transition-all duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>
                    </div>
                    <span class="text-xl font-black text-white tracking-tight leading-none">
                        Medvion<span class="text-cyan-400">+</span>
                    </span>
                </a>

                {{-- ── Desktop Links ── --}}
                <nav class="hidden md:flex items-center gap-1">
                    @foreach ([
                        [url('/'),      __('land.nav_home')],
                        [url('/about'), __('land.nav_about')],
                        ['#courses',    __('land.nav_courses')],
                    ] as [$href, $label])
                    <a href="{{ $href }}"
                       class="nav-link relative px-4 py-2 text-sm font-semibold text-white/70 hover:text-white rounded-lg transition-colors duration-200">
                        {{ $label }}
                        <span class="nav-underline absolute bottom-0.5 start-4 end-4 h-[2px] rounded-full bg-cyan-400 scale-x-0 transition-transform duration-300 origin-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}"></span>
                    </a>
                    @endforeach
                </nav>

                {{-- ── Right side ── --}}
                <div class="flex items-center gap-2">
                    {{-- Auth buttons desktop --}}
                    <div class="hidden md:flex items-center gap-2">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/admin') }}"
                                   class="px-4 py-2 text-sm font-bold text-white/80 hover:text-white transition">
                                    {{ __('land.nav_dashboard') }}
                                </a>
                            @else
                                <a href="{{ url('admin/login') }}"
                                   class="px-4 py-2 text-sm font-semibold text-white/70 hover:text-white transition">
                                    {{ __('land.nav_login') }}
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ url('admin/login') }}"
                                       class="nav-cta inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl text-sm font-bold text-white transition-all duration-300">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                                        {{ __('land.nav_register') }}
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>

                    {{-- Burger --}}
                    <button id="burger-btn"
                        class="md:hidden flex flex-col justify-center items-center w-10 h-10 rounded-xl bg-white/10 border border-white/15 gap-[5px] transition hover:bg-white/20"
                        aria-label="Toggle menu">
                        <span class="burger-line w-5 h-[2px] bg-white rounded-full transition-all duration-300 origin-center"></span>
                        <span class="burger-line w-5 h-[2px] bg-white rounded-full transition-all duration-300 origin-center"></span>
                        <span class="burger-line w-5 h-[2px] bg-white rounded-full transition-all duration-300 origin-center"></span>
                    </button>
                </div>

            </div>
        </div>

        {{-- ── Mobile Drawer ── --}}
        <div id="mobile-menu" class="md:hidden overflow-hidden" style="max-height:0; transition: max-height 0.45s cubic-bezier(.22,1,.36,1);">
            <div class="mx-4 mb-4 rounded-2xl overflow-hidden mobile-drawer">
                <nav class="flex flex-col p-2 gap-0.5">
                    @foreach ([
                        [url('/'),      __('land.nav_home'),    'M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25'],
                        [url('/about'), __('land.nav_about'),   'M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z'],
                        ['#courses',   __('land.nav_courses'),  'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5'],
                    ] as [$href, $label, $icon])
                    <a href="{{ $href }}"
                       class="mob-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200">
                        <svg class="w-4 h-4 text-cyan-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
                        {{ $label }}
                    </a>
                    @endforeach
                </nav>
                <div class="mx-4 h-px bg-white/10"></div>
                <div class="p-3 flex flex-col gap-2">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/admin') }}"
                               class="flex items-center justify-center py-3 rounded-xl text-sm font-bold text-white bg-white/10 hover:bg-white/15 transition">
                                {{ __('land.nav_dashboard') }}
                            </a>
                        @else
                            <a href="{{ url('admin/login') }}"
                               class="flex items-center justify-center py-3 rounded-xl text-sm font-semibold text-white/75 hover:text-white bg-white/5 hover:bg-white/10 transition">
                                {{ __('land.nav_login') }}
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ url('admin/login') }}"
                                   class="nav-cta flex items-center justify-center py-3 rounded-xl text-sm font-bold text-white transition">
                                    {{ __('land.nav_register') }}
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    {{-- ── Navbar CSS ── --}}
    <style>
        .navbar-transparent { background: transparent; }
        .navbar-solid {
            background: rgba(3,10,24,0.90);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.07);
            box-shadow: 0 4px 30px rgba(0,0,0,0.35);
        }
        .nav-link:hover .nav-underline { transform: scaleX(1); }
        .nav-cta {
            background: linear-gradient(135deg, #06b6d4, #6366f1);
            box-shadow: 0 4px 18px rgba(6,182,212,0.35);
        }
        .nav-cta:hover { box-shadow: 0 6px 28px rgba(6,182,212,0.55); transform: translateY(-1px); }
        .mobile-drawer {
            background: rgba(3,10,24,0.88);
            border: 1px solid rgba(255,255,255,0.08);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }
        #burger-btn.open .burger-line:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        #burger-btn.open .burger-line:nth-child(2) { opacity: 0; transform: scaleX(0); }
        #burger-btn.open .burger-line:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
        .mob-link { animation: mob-in 0.3s ease both; }
        #mobile-menu.open .mob-link:nth-child(1) { animation-delay: 0.04s; }
        #mobile-menu.open .mob-link:nth-child(2) { animation-delay: 0.09s; }
        #mobile-menu.open .mob-link:nth-child(3) { animation-delay: 0.14s; }
        @keyframes mob-in {
            from { opacity:0; transform: translateX(-8px); }
            to   { opacity:1; transform: translateX(0); }
        }
    </style>

    {{-- ── Navbar JS ── --}}
    <script>
    (function(){
        var h = document.getElementById('site-header');
        var b = document.getElementById('burger-btn');
        var m = document.getElementById('mobile-menu');
        var open = false;
        window.addEventListener('scroll', function(){
            h.classList.toggle('navbar-solid', window.scrollY > 40);
            h.classList.toggle('navbar-transparent', window.scrollY <= 40);
        }, { passive: true });
        b.addEventListener('click', function(){
            open = !open;
            b.classList.toggle('open', open);
            m.classList.toggle('open', open);
            m.style.maxHeight = open ? m.scrollHeight + 'px' : '0';
        });
        m.querySelectorAll('a').forEach(function(a){
            a.addEventListener('click', function(){
                open = false; b.classList.remove('open'); m.classList.remove('open'); m.style.maxHeight = '0';
            });
        });
    })();
    </script>

    {{-- ========== MAIN CONTENT ========== --}}
    <main>
        {{ $slot }}
    </main>

    {{-- ========== FOOTER ========== --}}
    <footer class="bg-[#030a18] border-t border-white/8 text-white py-12 mt-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div>
                    <div class="flex items-center gap-2.5 mb-2">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-cyan-400 to-indigo-500 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </div>
                        <span class="text-lg font-black tracking-tight">Medvion<span class="text-cyan-400">+</span></span>
                    </div>
                    <p class="text-white/40 text-sm">{{ __('land.footer_tagline') }}</p>
                </div>
                <nav class="flex gap-6 text-sm text-white/50">
                    <a href="{{ url('/') }}"     class="hover:text-white transition">{{ __('land.nav_home') }}</a>
                    <a href="{{ url('/about') }}" class="hover:text-white transition">{{ __('land.nav_about') }}</a>
                    <a href="#courses"            class="hover:text-white transition">{{ __('land.nav_courses') }}</a>
                </nav>
            </div>
            <div class="mt-8 pt-6 border-t border-white/8 text-center text-xs text-white/25">
                {!! __('land.footer_copy', ['year' => date('Y')]) !!}
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
