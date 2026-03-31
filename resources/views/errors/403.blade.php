<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('admin.errors.403.title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        
        @keyframes blob {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-900 overflow-hidden relative selection:bg-primary selection:text-white pb-32">

    <!-- خلفية حيوية تعتمد على ألوان Medvion -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute top-40 -left-20 w-72 h-72 bg-secondary/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-40 left-1/2 w-80 h-80 bg-primary-light/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="bg-white/80 backdrop-blur-2xl border border-white/50 shadow-2xl rounded-[2.5rem] w-full max-w-2xl px-8 py-14 text-center">
            
            <div class="flex justify-center mb-8">
                <!-- أيقونة القفل (Lock) -->
                <div class="relative w-28 h-28 flex items-center justify-center bg-primary/10 rounded-full ring-[12px] ring-white shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-14 h-14 text-primary">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                    <!-- شارة خطأ صغيرة باللون الأحمر -->
                    <div class="absolute bottom-1 right-1 w-8 h-8 bg-red-500 rounded-full flex items-center justify-center border-[3px] border-white shadow-sm shadow-red-500/50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="w-4 h-4 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- العنوان الكبير -->
            <h1 class="text-9xl font-black text-transparent bg-clip-text bg-gradient-to-br from-primary-dark via-primary to-primary-light drop-shadow-sm mb-2" style="line-height: 1.1;">
                403
            </h1>
            
            <h2 class="text-3xl font-bold text-gray-800 mb-5">
                {{ __('admin.errors.403.heading') }}
            </h2>
            
            <p class="text-gray-500 max-w-lg mx-auto text-lg mb-10 leading-relaxed font-medium">
                {{ __('admin.errors.403.message') }}
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center px-8 py-3.5 rounded-full bg-primary text-white font-bold text-lg shadow-lg shadow-primary/40 hover:bg-primary-light hover:shadow-primary/60 hover:-translate-y-1 transition-all duration-300 gap-2 w-full sm:w-auto overflow-hidden relative group">
                    <span class="absolute inset-0 w-full h-full rounded-lg opacity-0 group-hover:opacity-20 bg-gradient-to-t from-black to-transparent transition-opacity"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 relative z-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <span class="relative z-10">{{ __('admin.errors.403.back_home') }}</span>
                </a>

                <!-- زر الرجوع (أيقونة تتجه لليمين في اللغة العربية تعني الرجوع للخلف) -->
                <button onclick="window.history.back()" class="inline-flex items-center justify-center px-8 py-3.5 rounded-full bg-white text-gray-700 font-bold text-lg shadow-sm border-2 border-gray-100 hover:bg-gray-50 hover:border-gray-200 hover:text-primary transition-all duration-300 gap-2 w-full sm:w-auto group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 rtl:group-hover:translate-x-1 ltr:group-hover:-translate-x-1 transition-transform rtl:rotate-0 ltr:rotate-180">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                    <span>{{ __('admin.errors.403.go_back') }}</span>
                </button>
            </div>
            
        </div>
    </div>
</body>
</html>
