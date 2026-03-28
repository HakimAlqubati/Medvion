<x-layouts.frontend :title="__('land.courses_heading')">

    {{-- Minimal Hero for Internal Pages --}}
    <section class="relative pt-44 pb-20 lg:pt-52 lg:pb-28 bg-primary overflow-hidden isolate">
        <div class="absolute inset-0 z-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&q=80')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="absolute inset-0 z-0 bg-gradient-to-b from-primary-dark/80 to-primary/95 pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center reveal">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                {{ __('land.courses_heading') }}
            </h1>
            <p class="text-lg md:text-xl text-white/80 max-w-2xl mx-auto">
                استكشف مجموعة متنوعة من الدورات المتخصصة في مجالات الرعاية الصحية والتأهيل الطبي.
            </p>
        </div>
    </section>

    {{-- Courses Grid --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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

            {{-- Pagination --}}
            @if($courses->hasPages())
                <div class="mt-12 flex justify-center reveal delay-200">
                    {{ $courses->links() }}
                </div>
            @endif
        </div>
    </section>

</x-layouts.frontend>
