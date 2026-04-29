@if($section && $section->experts->isNotEmpty())
<section id="academic-experts"
    class="py-24 {{ $altBg ? 'bg-gray-50' : 'bg-white' }} relative overflow-hidden"
    style="content-visibility: auto; contain-intrinsic-size: 800px;">

    {{-- CSS for Swiper (loaded only when needed) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Background Decoration --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0" aria-hidden="true">
        <div class="absolute top-[20%] -left-[10%] w-[30%] h-[30%] bg-secondary/5 rounded-full blur-[100px] transform-gpu"></div>
        <div class="absolute -bottom-[10%] -right-[10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-[100px] transform-gpu"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {{-- Section Header from Database --}}
        <div class="text-center max-w-3xl mx-auto mb-20 reveal">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary/10 text-secondary text-sm font-semibold tracking-wide uppercase ring-1 ring-secondary/20 mb-6">
                {{ __('land.academic_badge') ?? 'أكاديمية' }}
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                {{ $section->title['ar'] ?? $section->title }}
            </h2>
            @if(!empty($section->description['ar'] ?? $section->description))
            <p class="text-lg text-gray-500 leading-relaxed">
                {{ $section->description['ar'] ?? $section->description }}
            </p>
            @endif
        </div>

        {{-- Swiper Slider --}}
        <div class="swiper academic-swiper reveal delay-100 !pb-16">
            <div class="swiper-wrapper">
                @foreach($section->experts as $expert)
                @php
                    $name = $expert->name['ar'] ?? $expert->name;
                @endphp
                <div class="swiper-slide h-auto">
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 h-full flex flex-col items-center text-center transition-all duration-300 hover:shadow-xl hover:border-secondary/30 group">
                        
                        {{-- Image / Avatar --}}
                        <div class="relative mb-6">
                            <div class="w-28 h-28 mx-auto rounded-full p-1 bg-gradient-to-tr from-primary to-secondary">
                                <img src="{{ asset($expert->image) }}" 
                                     alt="{{ $name }}" 
                                     class="w-full h-full rounded-full object-cover border-4 border-white bg-white"
                                     loading="lazy" 
                                     decoding="async">
                            </div>
                            <div class="absolute -bottom-2 right-1/2 transform translate-x-1/2 bg-white rounded-full p-1.5 shadow-md border border-gray-100">
                                <svg class="w-5 h-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>

                        {{-- Info --}}
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">{{ $name }}</h3>
                        
                        {{-- Stats --}}
                        <div class="mt-auto pt-6 w-full grid grid-cols-2 gap-4 border-t border-gray-50">
                            <div class="flex flex-col items-center justify-center p-3 rounded-2xl bg-gray-50/80 group-hover:bg-primary/5 transition-colors">
                                <span class="text-2xl font-black text-gray-800">{{ $expert->courses_count }}</span>
                                <span class="text-xs font-semibold text-gray-500 uppercase">{{ __('land.courses') ?? 'دورات' }}</span>
                            </div>
                            <div class="flex flex-col items-center justify-center p-3 rounded-2xl bg-gray-50/80 group-hover:bg-secondary/5 transition-colors">
                                <span class="text-2xl font-black text-gray-800">{{ $expert->students_count }}</span>
                                <span class="text-xs font-semibold text-gray-500 uppercase">{{ __('land.students') ?? 'طالب' }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>

            {{-- Swiper Pagination --}}
            <div class="swiper-pagination !bottom-0"></div>
        </div>

    </div>

    {{-- Initialization --}}
    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.academic-swiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: false,
                grabCursor: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.academic-swiper .swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                breakpoints: {
                    640: { slidesPerView: 2, spaceBetween: 24 },
                    1024: { slidesPerView: 3, spaceBetween: 32 },
                    1280: { slidesPerView: 4, spaceBetween: 32 },
                }
            });
        });
    </script>
</section>
@endif
