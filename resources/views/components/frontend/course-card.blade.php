{{--
    Course Card Component
    Props:
      - $title    : string
      - $category : string
      - $level    : string  (beginner | inter | advanced)
      - $hours    : int
      - $students : int
      - $color    : 'primary' | 'secondary'  (optional, default primary)
--}}
@props([
    'title'    => '',
    'category' => '',
    'level'    => 'beginner',
    'hours'    => 8,
    'students' => 120,
    'color'    => 'primary',
])

@php
    $levelLabel = match($level) {
        'inter'    => __('land.course_level_inter'),
        'advanced' => __('land.course_level_advanced'),
        default    => __('land.course_level_beginner'),
    };

    $levelColor = match($level) {
        'inter'    => 'bg-yellow-100 text-yellow-700',
        'advanced' => 'bg-red-100 text-red-700',
        default    => 'bg-green-100 text-green-700',
    };

    $iconBg = $color === 'secondary' ? 'bg-secondary/10' : 'bg-primary/10';
    $iconColor = $color === 'secondary' ? 'text-secondary' : 'text-primary';
@endphp

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden">

    {{-- Card Header / Thumbnail placeholder --}}
    <div class="h-36 {{ $iconBg }} flex items-center justify-center">
        <svg class="w-16 h-16 {{ $iconColor }} opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
    </div>

    {{-- Card Body --}}
    <div class="p-5 flex flex-col flex-1">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-bold text-secondary bg-secondary/10 px-3 py-1 rounded-full">
                {{ $category }}
            </span>
            <span class="text-xs font-semibold {{ $levelColor }} px-2.5 py-1 rounded-full">
                {{ $levelLabel }}
            </span>
        </div>

        <h3 class="text-base font-bold text-gray-800 mb-4 flex-1 leading-snug">{{ $title }}</h3>

        <div class="flex items-center justify-between text-xs text-gray-400 border-t border-gray-100 pt-3 mt-auto">
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $hours }} {{ __('land.course_hours') }}
            </span>
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                {{ $students }} {{ __('land.course_students') }}
            </span>
        </div>

        <a href="#"
           class="mt-4 w-full text-center py-2.5 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary-light transition">
            {{ __('land.course_enroll') }}
        </a>
    </div>
</div>
