{{-- Hero Section --}}
<section class="relative overflow-hidden bg-gradient-to-br from-primary-dark via-primary to-primary-light text-white py-20 lg:py-32">

    {{-- Background decorative circles --}}
    <div class="absolute -top-20 -start-20 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-20 -end-20 w-80 h-80 bg-secondary/20 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        {{-- Badge --}}
        <span class="inline-block mb-6 px-4 py-1.5 bg-secondary/20 text-secondary-light border border-secondary/30 rounded-full text-xs font-bold uppercase tracking-widest">
            Medvion Platform
        </span>

        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6 drop-shadow-md">
            {{ __('land.hero_title') }}
        </h1>

        <p class="mt-4 text-lg sm:text-xl text-white/80 max-w-3xl mx-auto mb-10 leading-relaxed">
            {{ __('land.hero_subtitle') }}
        </p>

        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
            <a href="#courses"
               class="px-8 py-3.5 bg-secondary text-white font-bold rounded-lg hover:bg-secondary-dark transition shadow-lg shadow-secondary/30 text-sm">
                {{ __('land.hero_cta_primary') }}
            </a>
            <a href="{{ url('/about') }}"
               class="px-8 py-3.5 bg-white/10 text-white font-bold rounded-lg hover:bg-white/20 border border-white/30 transition text-sm backdrop-blur">
                {{ __('land.hero_cta_secondary') }}
            </a>
        </div>

        {{-- Stats strip --}}
        <div class="mt-16 grid grid-cols-3 gap-6 max-w-lg mx-auto text-center">
            <div>
                <p class="text-3xl font-extrabold text-secondary">+500</p>
                <p class="text-white/60 text-xs mt-1">{{ app()->getLocale() === 'ar' ? 'متدرب' : 'Trainees' }}</p>
            </div>
            <div>
                <p class="text-3xl font-extrabold text-secondary">+40</p>
                <p class="text-white/60 text-xs mt-1">{{ app()->getLocale() === 'ar' ? 'دورة تدريبية' : 'Courses' }}</p>
            </div>
            <div>
                <p class="text-3xl font-extrabold text-secondary">+20</p>
                <p class="text-white/60 text-xs mt-1">{{ app()->getLocale() === 'ar' ? 'خبير معتمد' : 'Experts' }}</p>
            </div>
        </div>

    </div>
</section>
