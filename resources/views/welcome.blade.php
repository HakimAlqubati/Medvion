<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('land.title') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-2xl font-bold text-primary">
                        Medvion<span class="text-secondary">+</span>
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-primary transition">{{ __('land.dashboard') }}</a>
                    @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-primary transition">{{ __('land.login') }}</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-primary-light transition">{{ __('land.register') }}</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <section class="bg-primary-light/10 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-primary mb-6">
                {{ __('land.hero_heading') }}
            </h1>
            <p class="mt-4 text-lg lg:text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                {{ __('land.hero_subheading') }}
            </p>
            <div class="flex justify-center gap-4">
                <a href="#courses" class="px-8 py-3 bg-secondary text-white font-bold rounded-md hover:bg-secondary-dark transition shadow-lg">{{ __('land.browse_courses') }}</a>
                <a href="#about" class="px-8 py-3 bg-white text-primary border border-primary font-bold rounded-md hover:bg-gray-50 transition">{{ __('land.about_us') }}</a>
            </div>
        </div>
    </section>

    <section id="about" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary">{{ __('land.features_heading') }}</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6 border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="text-secondary mb-4 flex justify-center">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">{{ __('land.feature_1_title') }}</h3>
                    <p class="text-gray-600 text-sm">{{ __('land.feature_1_desc') }}</p>
                </div>
                <div class="p-6 border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="text-secondary mb-4 flex justify-center">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">{{ __('land.feature_2_title') }}</h3>
                    <p class="text-gray-600 text-sm">{{ __('land.feature_2_desc') }}</p>
                </div>
                <div class="p-6 border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="text-secondary mb-4 flex justify-center">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">{{ __('land.feature_3_title') }}</h3>
                    <p class="text-gray-600 text-sm">{{ __('land.feature_3_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-primary-dark text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-300">
            <p>{!! __('land.footer_copy', ['year' => date('Y')]) !!}</p>
        </div>
    </footer>

</body>

</html>