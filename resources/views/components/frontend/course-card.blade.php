{{--
    Course Card Component
    Props:
      - $course : App\Models\Course
      - $color  : 'primary' | 'secondary'  (optional, default primary)
--}}
@props([
    'course',
    'color' => 'primary',
])

@php
    $levelLabel = match($course->level) {
        'inter'    => __('land.course_level_inter'),
        'advanced' => __('land.course_level_advanced'),
        default    => __('land.course_level_beginner'),
    };

    $levelColor = match($course->level) {
        'inter'    => 'bg-yellow-100 text-yellow-700',
        'advanced' => 'bg-red-100 text-red-700',
        default    => 'bg-green-100 text-green-700',
    };

    $iconBg = $color === 'secondary' ? 'bg-secondary/10' : 'bg-primary/10';
    $iconColor = $color === 'secondary' ? 'text-secondary' : 'text-primary';
@endphp

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden">

    {{-- Card Header / Thumbnail --}}
    <div class="relative h-44 overflow-hidden {{ $iconBg }} flex items-center justify-center">
        @if($course->image)
            <img src="{{ Str::startsWith($course->image, ['http://', 'https://']) ? $course->image : asset('storage/' . $course->image) }}" 
                 alt="{{ $course->title }}" 
                 onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80';" 
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
        @else
            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80" alt="{{ $course->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 grayscale-[20%] opacity-90">
        @endif

        {{-- Price Badge Overlay --}}
        <div class="absolute top-4 {{ app()->getLocale() === 'ar' ? 'left-4' : 'right-4' }}">
            <span class="bg-white/95 backdrop-blur-sm text-primary font-bold px-3 py-1 rounded-lg shadow-sm text-sm">
                @if($course->price > 0)
                    {{ $course->price }} {{ __('land.currency_sar') }}
                @else
                    {{ __('land.course_free') }}
                @endif
            </span>
        </div>
    </div>

    {{-- Card Body --}}
    <div class="p-5 flex flex-col flex-1">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-bold text-secondary bg-secondary/10 px-3 py-1 rounded-full">
                {{ optional($course->category)->name ?? '' }}
            </span>
            <span class="text-xs font-semibold {{ $levelColor }} px-2.5 py-1 rounded-full">
                {{ $levelLabel }}
            </span>
        </div>

        <h3 class="text-base font-bold text-gray-800 mb-4 flex-1 leading-snug line-clamp-2">{{ $course->title }}</h3>

        <div class="flex items-center justify-between text-xs text-gray-400 border-t border-gray-100 pt-3 mt-auto">
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $course->hours }} {{ __('land.course_hours') }}
            </span>
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                {{ $course->students_count }} {{ __('land.course_students') }}
            </span>
        </div>

        <a href="{{ route('courses.show', $course->slug) }}"
           class="mt-4 w-full text-center py-2.5 bg-primary text-white text-sm font-bold rounded-lg hover:bg-primary-light hover:shadow-lg hover:shadow-primary/20 transition-all duration-300">
            {{ __('land.course_enroll') }}
        </a>
    </div>
</div>
