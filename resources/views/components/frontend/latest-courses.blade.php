@props(['altBg' => false, 'courses' => null])

@php
    $courses = $courses ?? app(\App\Services\Frontend\CourseService::class)->getLatestCourses(3);
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

        {{-- Course Cards Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 reveal delay-100">
            @forelse($courses as $course)
                <x-frontend.course-card 
                    :course="$course" 
                    :color="$loop->even ? 'secondary' : 'primary'" 
                />
            @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center text-gray-500 py-12">
                    لا توجد دورات متاحة حالياً.
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

    </div>
</section>
