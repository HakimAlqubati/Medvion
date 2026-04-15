<x-layouts.frontend :title="$course->title . ' | ' . __('land.course_brief')">

    {{-- Course Header --}}
    <section class="relative pt-44 pb-16 lg:pt-52 lg:pb-24 bg-primary overflow-hidden isolate">
        <div class="absolute inset-0 z-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&q=80')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="absolute inset-0 z-0 bg-gradient-to-r from-primary-dark/90 to-primary/80 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 reveal">
            <div class="max-w-3xl">
                <span class="inline-block px-3 py-1 bg-white/10 text-white text-sm font-bold rounded-full mb-6 relative z-20 shadow-sm border border-white/10">
                    {{ optional($course->category)->name ?? __('land.course_1_category') }}
                </span>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white mb-6 leading-snug">
                    {{ $course->title }}
                </h1>
                <p class="text-lg text-white/80 leading-relaxed mb-8">
                    {{ $course->brief }}
                </p>

                <div class="flex flex-wrap items-center gap-6 text-sm text-white/90">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ $course->hours }} {{ __('land.course_hours') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                        <span>{{ __('lang.arabic') ?? 'العربية' }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="text-green-400 font-bold">{{ __('land.certified_internationally') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Course Content --}}
    <section class="py-16 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                {{-- Main Details --}}
                <div class="lg:col-span-2 space-y-12">

                    {{-- Brief --}}
                    <div class="reveal delay-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 border-r-4 border-primary pr-4">{{ __('land.course_brief') }}</h3>
                        <div class="prose prose-lg text-gray-600 leading-relaxed max-w-none">
                            <p>{{ $course->brief }}</p>
                        </div>
                    </div>

                    {{-- Objectives --}}
                    <div class="reveal delay-200">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 border-r-4 border-primary pr-4">{{ __('land.course_objectives') }}</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($course->objectives ?? [] as $point)
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100 hover:border-primary/20 transition-colors">
                                <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <span class="text-gray-700 font-medium">{{ $point }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Target Audience --}}
                    <div class="reveal delay-300">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 border-r-4 border-primary pr-4">{{ __('land.course_target_audience') }}</h3>
                        <div class="bg-primary/5 rounded-2xl p-6 border border-primary/10">
                            <ul class="space-y-4">
                                @foreach($course->target_audience ?? [] as $audience)
                                <li class="flex items-center gap-3 text-gray-700">
                                    <div class="w-2 h-2 rounded-full bg-primary shrink-0"></div>
                                    <span class="font-medium">{{ $audience }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Course Content --}}
                    <div class="reveal delay-400">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 border-r-4 border-primary pr-4">{{ __('land.course_content') }}</h3>
                        <div class="space-y-4">
                            @foreach($course->content_modules ?? [] as $index => $module)
                            <div class="flex items-center justify-between p-5 rounded-xl border border-gray-100 bg-white hover:shadow-md transition-shadow">
                                <div class="flex items-center gap-4">
                                    <span class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center font-bold text-sm">{{ $index + 1 }}</span>
                                    <span class="font-bold text-gray-800">{{ $module['title'] ?? '' }}</span>
                                </div>
                                @if(isset($module['duration']))
                                    <span class="text-sm text-gray-400 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        {{ $module['duration'] }}
                                    </span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="registration-form" class="reveal mt-12 pt-12 border-t border-gray-100">
                        <x-frontend.course-registration-form :course="$course" />
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-1 reveal delay-300">
                    <div class="sticky top-32 bg-white rounded-2xl border border-gray-100 shadow-xl overflow-hidden">
                        {{-- Video/Image --}}
                        <div class="aspect-video bg-black relative group overflow-hidden">
                            @if($course->video_url)
                                <iframe
                                    class="absolute inset-0 w-full h-full"
                                    src="{{ str_contains($course->video_url, 'youtube') ? $course->video_url . '?rel=0&showinfo=0' : $course->video_url }}"
                                    title="{{ $course->title }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            @elseif($course->image)
                                <img src="{{ Str::startsWith($course->image, ['http://', 'https://']) ? $course->image : asset('storage/' . $course->image) }}"
                                     alt="{{ $course->title }}"
                                     onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80';"
                                     class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80" alt="{{ $course->title }}" class="absolute inset-0 w-full h-full object-cover grayscale-[20%] opacity-90">
                            @endif
                        </div>

                        <div class="p-6 md:p-8">
                            <div class="flex items-center gap-2 mb-6">
                                <div class="flex items-center gap-2 mb-6">
                                    <span class="text-4xl font-black text-primary">
                                        {{ $course->price > 0 ? $course->price . ' ' . __('land.currency_sar') : __('land.course_free') }}
                                    </span>
                                </div>
                            </div>

                            <a href="#registration-form"
                               class="flex items-center justify-center w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/30 hover:-translate-y-1 transition-all duration-300 mb-4 text-lg">
                                {{ __('land.enroll_now') }}
                            </a>
                            <p class="text-sm text-center text-gray-500 mb-6">{{ __('land.enroll_instant_access') }}</p>

                            <div class="space-y-4 border-t border-gray-100 pt-6">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                                        {{ __('land.course_level') }}
                                    </span>
                                    @php
                                        $levelLabel = match($course->level) {
                                            'inter'    => __('land.course_level_inter'),
                                            'advanced' => __('land.course_level_advanced'),
                                            default    => __('land.course_level_beginner'),
                                        };
                                    @endphp
                                    <span class="font-bold text-gray-900 bg-gray-100 px-2 py-0.5 rounded">{{ $levelLabel }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                        {{ __('land.enrolled_count') }}
                                    </span>
                                    <span class="font-bold text-gray-900">{{ number_format($course->students_count) }} {{ __('land.students') }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        {{ __('land.certificate') }}
                                    </span>
                                    <span class="font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded">{{ __('land.certified_internationally') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layouts.frontend>
