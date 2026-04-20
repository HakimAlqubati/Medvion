@props(['altBg' => false, 'courses' => null])

@php
// جلب الكورسات أو استخدام الممررة مسبقاً
$courses = $courses ?? app(\App\Services\Frontend\CourseService::class)->getLatestCourses(3);
// التحقق مما إذا كان المستخدم ضيفاً (غير مسجل دخول)
$isGuest = ! auth()->check();
@endphp

{{-- قسم أحدث الكورسات --}}
<section id="courses" class="py-20 {{ $altBg ? 'bg-gray-50' : 'bg-white' }} overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ترويسة القسم --}}
        <div class="text-center max-w-2xl mx-auto mb-14 reveal">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-primary">
                {{ __('land.courses_heading') }}
            </h2>
            <p class="mt-4 text-gray-500 text-base leading-relaxed">
                {{ __('land.courses_subheading') }}
            </p>
        </div>

        {{--
            حاوية الكورسات: 
            نستخدم 'relative' لنتمكن من وضع طبقة تسجيل الدخول (Overlay) فوقها لاحقاً
        --}}
        <div class="relative min-h-[400px]">

            {{--
                شبكة الكورسات (Grid):
                إذا كان المستخدم ضيفاً، نطبق تأثير التمويه (blur-md)، وتقليل الشفافية (opacity-40)، 
                ونمنع التفاعل معها (pointer-events-none)
            --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 {{ $isGuest ? 'opacity-20 select-none pointer-events-none scale-[0.98]' : 'reveal delay-100' }}">
                @forelse($courses as $course)
                <x-frontend.course-card
                    :course="$course"
                    :color="$loop->even ? 'secondary' : 'primary'" />
                @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center text-gray-500 py-12">
                    {{ __('land.courses_no_results') }}
                </div>
                @endforelse
            </div>

            @if($isGuest)
            {{--
                    طبقة الضيف (Guest Overlay):
                    تظهر فوق الكورسات المموهة في المنتصف تماماً 
                --}}
            <div class="absolute inset-0 z-10 flex items-center justify-center p-4">

                {{-- صندوق الدعوة للتسجيل (CTA Card) بتأثير الزجاج (Glassmorphism) --}}
                <div class="relative overflow-hidden rounded-3xl bg-primary/70 backdrop-blur-md shadow-2xl shadow-primary/20 max-w-3xl w-full text-center p-8 sm:p-12 border border-white/20">

                    {{-- تأثيرات زخرفية خلفية للصندوق (تم تقليل الشفافية لتناسب الزجاج) --}}
                    <div class="absolute -top-24 -right-24 w-72 h-72 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="relative z-10 flex flex-col items-center">
                        {{-- شارة الحظر --}}
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/20 text-white/90 text-xs font-bold uppercase tracking-widest mb-6">
                            <svg class="w-4 h-4 text-yellow-300 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            {{ __('land.courses_auth_badge') }}
                        </span>

                        {{-- العنوان والوصف --}}
                        <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white mb-4 max-w-lg leading-tight">
                            {{ __('land.courses_auth_heading') }}
                        </h3>
                        <p class="text-white/90 text-base sm:text-lg max-w-xl leading-relaxed mb-8">
                            {{ __('land.courses_auth_desc') }}
                        </p>

                        {{-- مميزات التسجيل --}}
                        <div class="flex flex-wrap justify-center gap-3 mb-8">
                            @foreach (['courses_auth_feature_1', 'courses_auth_feature_2', 'courses_auth_feature_3'] as $feature)
                            <span class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/10 border border-white/15 text-white text-sm font-medium">
                                <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ __("land.{$feature}") }}
                            </span>
                            @endforeach
                        </div>

                        {{-- أزرار الإجراءات (CTAs) --}}
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
                            <a href="{{ route('register') }}"
                                target="_blank"
                                class="group flex items-center justify-center gap-2.5 px-8 py-3.5 bg-white/95 text-primary font-bold rounded-xl hover:bg-white hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 w-full sm:w-auto text-base">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                {{ __('land.courses_auth_cta_register') }}
                            </a>

                            <span class="text-white/70 text-sm hidden sm:block">{{ __('land.courses_auth_already') }}</span>

                            <a href="{{ url('admin/login') }}"
                                target="_blank"
                                class="flex items-center justify-center gap-2 px-6 py-3.5 border-2 border-white/30 text-white font-semibold rounded-xl hover:bg-white/10 hover:border-white/50 transition-all duration-300 w-full sm:w-auto text-sm">
                                {{ __('land.courses_auth_cta_login') }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ app()->getLocale() === 'ar' ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7' }}" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        {{-- زر عرض الكل (يظهر فقط إذا كان المستخدم مسجلاً) --}}
        @if(!$isGuest && count($courses) > 0)
        <div class="mt-12 text-center reveal delay-200">
            <a href="{{ route('courses.index') }}"
                class="inline-flex items-center gap-2 px-8 py-3 border-2 border-primary text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition-colors duration-300 text-sm">
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