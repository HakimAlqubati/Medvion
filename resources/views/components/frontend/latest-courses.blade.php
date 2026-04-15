@props(['altBg' => false, 'courses' => null])

@php
    $courses = $courses ?? app(\App\Services\Frontend\CourseService::class)->getLatestCourses(3);
    $isGuest = ! auth()->check();
@endphp

{{-- Latest Courses Section --}}
<section id="courses" class="py-20 {{ $altBg ? 'bg-gray-50' : 'bg-white' }}">
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
            {{-- ═══════════════════════════════════════════════════
                 GUEST AUTH WALL — Premium CTA Block
            ═══════════════════════════════════════════════════ --}}
            <div class="reveal">
                <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-primary-dark via-primary to-primary-light shadow-2xl shadow-primary/25">

                    {{-- Decorative background blobs --}}
                    <div class="absolute -top-24 -right-24 w-72 h-72 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-secondary/20 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-white/3 rounded-full blur-3xl pointer-events-none"></div>

                    {{-- Ghost skeleton cards (blurred) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-6 pb-0 opacity-20 blur-[2px] pointer-events-none select-none" aria-hidden="true">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="bg-white/10 rounded-2xl h-52 animate-pulse"></div>
                        @endfor
                    </div>

                    {{-- Lock overlay content --}}
                    <div class="relative z-10 flex flex-col items-center text-center px-6 py-14 sm:py-20">

                        {{-- Badge --}}
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/20 text-white/90 text-xs font-bold uppercase tracking-widest mb-8">
                            <svg class="w-3.5 h-3.5 text-yellow-300 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                            {{ __('land.courses_auth_badge') }}
                        </span>

                        {{-- Lock icon --}}
                        <div class="w-20 h-20 rounded-2xl bg-white/10 border border-white/20 flex items-center justify-center mb-8 shadow-xl">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>

                        <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white mb-5 max-w-lg leading-snug">
                            {{ __('land.courses_auth_heading') }}
                        </h3>

                        <p class="text-white/70 text-base sm:text-lg max-w-xl leading-relaxed mb-10">
                            {{ __('land.courses_auth_desc') }}
                        </p>

                        {{-- Feature pills --}}
                        <div class="flex flex-wrap justify-center gap-3 mb-10">
                            @foreach (['courses_auth_feature_1', 'courses_auth_feature_2', 'courses_auth_feature_3'] as $feature)
                                <span class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/15 text-white/85 text-sm font-medium">
                                    <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ __("land.{$feature}") }}
                                </span>
                            @endforeach
                        </div>

                        {{-- CTAs --}}
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                            <a href="{{ route('register') }}"
                               class="group inline-flex items-center gap-2.5 px-8 py-4 bg-white text-primary font-bold rounded-2xl hover:bg-gray-50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 text-base">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                {{ __('land.courses_auth_cta_register') }}
                            </a>
                            <span class="text-white/50 text-sm hidden sm:block">{{ __('land.courses_auth_already') }}</span>
                            <a href="{{ url('login') }}"
                               class="inline-flex items-center gap-2 px-6 py-4 border border-white/25 text-white/85 font-semibold rounded-2xl hover:bg-white/10 hover:border-white/40 transition-all duration-300 text-sm">
                                {{ __('land.courses_auth_cta_login') }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="{{ app()->getLocale() === 'ar' ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7' }}"/>
                                </svg>
                            </a>
                        </div>

                        <p class="mt-6 text-white/40 text-xs">
                            {{ __('land.courses_auth_redirect') }}
                        </p>
                    </div>
                </div>
            </div>

        @else
            {{-- ═══════════════════════════════════════════════════
                 AUTHENTICATED — Show real course cards
            ═══════════════════════════════════════════════════ --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 reveal delay-100">
                @forelse($courses as $course)
                    <x-frontend.course-card
                        :course="$course"
                        :color="$loop->even ? 'secondary' : 'primary'"
                    />
                @empty
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center text-gray-500 py-12">
                        {{ __('land.courses_no_results') }}
                    </div>
                @endforelse
            </div>

            {{-- View All CTA --}}
            <div class="mt-12 text-center reveal delay-200">
                <a href="{{ route('courses.index') }}"
                   class="inline-flex items-center gap-2 px-8 py-3 border-2 border-primary text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition text-sm">
                    {{ __('land.courses_view_all') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="{{ app()->getLocale() === 'ar' ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7' }}" />
                    </svg>
                </a>
            </div>
        @endif

    </div>
</section>
