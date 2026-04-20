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
@endphp

{{-- 
   Group class applied + will-change-transform لتهيئة المعالج للحركة
--}}
<div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col overflow-hidden will-change-transform relative">
    
    {{-- Card Header / Thumbnail --}}
    <div class="relative h-44 overflow-hidden {{ $iconBg }} flex items-center justify-center">
        @if($course->image)
            <img src="{{ Str::startsWith($course->image, ['http://', 'https://']) ? $course->image : asset('storage/' . $course->image) }}" 
                 alt="{{ $course->title }}" 
                 loading="lazy"
                 decoding="async"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
        @else
            {{-- Local CSS Skeleton Icon بدلاً عن Unsplash --}}
            <div class="w-full h-full flex flex-col items-center justify-center text-primary/30">
                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span class="text-[10px] uppercase font-bold tracking-widest text-primary/40">Medvion</span>
            </div>
        @endif

        {{-- Price Badge Overlay (Solid + Subtle Shadow instead of Blur) --}}
        <div class="absolute top-3 {{ app()->getLocale() === 'ar' ? 'left-3' : 'right-3' }}">
            <span class="bg-white/95 text-primary font-bold px-3 py-1 rounded-md shadow-sm text-xs">
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
            <span class="text-[11px] font-bold text-secondary bg-secondary/10 px-2.5 py-1 rounded-full shrink truncate">
                {{ optional($course->category)->name ?? __('land.course_general') }}
            </span>
            <span class="text-[11px] font-bold {{ $levelColor }} px-2.5 py-1 rounded-full shrink-0">
                {{ $levelLabel }}
            </span>
        </div>

        <h3 class="text-sm font-bold text-gray-800 mb-4 flex-1 leading-snug line-clamp-2 group-hover:text-primary transition-colors duration-200">
            {{ $course->title }}
        </h3>

        <div class="flex items-center justify-between text-[11px] text-gray-500 border-t border-gray-50 pt-3 mt-auto">
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $course->hours }} {{ __('land.course_hours') }}
            </span>
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{ $course->students_count }} {{ __('land.course_students') }}
            </span>
        </div>
    </div>
    
    {{-- 
        توسعة مساحة النقرة لبطاقة كاملة دون إضافة أزرار مكدسة للـ DOM
    --}}
    <a href="{{ route('courses.show', $course->slug) }}" class="absolute inset-0 z-10 focus:outline-none" aria-label="{{ $course->title }}"></a>
</div>
