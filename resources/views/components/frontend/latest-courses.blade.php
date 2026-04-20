{{-- 
    Component: x-frontend.latest-courses
    Pure Presentational View: No Business Logic
--}}
<section id="courses" class="py-20 {{ $altBg ? 'bg-gray-50' : 'bg-white' }} overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-14 reveal">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-primary">
                {{ __('land.courses_heading') }}
            </h2>
            <p class="mt-4 text-gray-500 text-base leading-relaxed">
                {{ __('land.courses_subheading') }}
            </p>
        </div>

        @if($isGuest)
            {{-- Guest Layout: Lightweight Static Banner بدل التغبيش الثقيل --}}
            <div class="relative flex items-center justify-center rounded-3xl bg-gray-50 border border-gray-100 overflow-hidden p-8 sm:p-14">
                {{-- أشكال زخرفية خفيفة بدون blur-3xl لتوفير الـ GPU --}}
                <div class="absolute -top-16 -right-16 w-64 h-64 bg-primary/5 rounded-full pointer-events-none"></div>
                <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-secondary/5 rounded-full pointer-events-none"></div>

                <div class="relative z-10 flex flex-col items-center max-w-2xl text-center">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-gray-200 text-primary text-xs font-bold uppercase tracking-widest mb-6 shadow-sm">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        {{ __('land.courses_auth_badge') }}
                    </span>

                    <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-4 leading-tight">
                        {{ __('land.courses_auth_heading') }}
                    </h3>
                    <p class="text-gray-500 text-base mb-8">
                        {{ __('land.courses_auth_desc') }}
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
                        <a href="{{ route('register') }}"
                           class="flex items-center justify-center px-8 py-3.5 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark transition-colors duration-300 w-full sm:w-auto">
                            {{ __('land.courses_auth_cta_register') }}
                        </a>
                        <a href="{{ url('admin/login') }}"
                           class="flex items-center justify-center px-8 py-3.5 bg-white border border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition-colors duration-300 w-full sm:w-auto hover:shadow-sm">
                            {{ __('land.courses_auth_cta_login') }}
                        </a>
                    </div>
                </div>
            </div>
        @else
            {{-- Authenticated Layout: Real Component Render --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 reveal delay-100">
                @forelse($courses as $course)
                    <x-frontend.course-card :course="$course" :color="$loop->even ? 'secondary' : 'primary'" />
                @empty
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center text-gray-500 py-12">
                        {{ __('land.courses_no_results') }}
                    </div>
                @endforelse
            </div>

            @if($courses->isNotEmpty())
            <div class="mt-12 text-center reveal delay-200">
                <a href="{{ route('courses.index') }}"
                   class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary/10 text-primary font-bold rounded-xl hover:bg-primary hover:text-white transition-colors duration-300">
                    {{ __('land.courses_view_all') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ app()->getLocale() === 'ar' ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7' }}" />
                    </svg>
                </a>
            </div>
            @endif
        @endif

    </div>
</section>