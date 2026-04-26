@if($testimonials->count() > 0)
<section id="testimonials" class="py-20 md:py-32 {{ $altBg ? 'bg-gray-50' : 'bg-white' }} relative overflow-hidden">
    
    {{-- CSS for Swiper (loaded only when needed) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Background Decoration --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-secondary/5 rounded-full blur-3xl opacity-50"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Section Header --}}
        <div class="text-center max-w-3xl mx-auto mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 border border-primary/20 text-primary mb-4 shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                <span class="text-xs sm:text-sm font-bold tracking-widest uppercase">{{ __('land.testimonials_badge') ?? 'Testimonials' }}</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-[1.2] mb-6">
                {{ __('land.testimonials_title') ?? 'What Our Clients Say' }}
            </h2>
            <p class="text-lg md:text-xl text-gray-500 leading-relaxed">
                {{ __('land.testimonials_subtitle') ?? 'Discover the impact of Medvion through the experiences of healthcare professionals.' }}
            </p>
        </div>

        {{-- Swiper Slider --}}
        <div class="swiper testimonials-swiper reveal delay-100 !pb-16">
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide h-auto">
                        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-gray-100 h-full flex flex-col transition-all duration-300 hover:shadow-xl hover:border-primary/20 group">
                            
                            {{-- Rating Stars --}}
                            <div class="flex items-center gap-1 mb-6">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>

                            {{-- Review Content --}}
                            <div class="flex-grow">
                                <svg class="w-8 h-8 text-primary/20 mb-4 transform -scale-x-100" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                    <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                                </svg>
                                <p class="text-gray-600 text-lg leading-relaxed mb-8 italic">
                                    "{{ $testimonial->content }}"
                                </p>
                            </div>

                            {{-- Client Info --}}
                            <div class="flex items-center gap-4 mt-auto pt-6 border-t border-gray-50">
                                <div class="relative">
                                    @if($testimonial->avatar_image)
                                        <img src="{{ asset('storage/' . $testimonial->avatar_image) }}" alt="{{ $testimonial->client_name }}" class="w-14 h-14 rounded-full object-cover shadow-sm ring-2 ring-primary/10">
                                    @else
                                        <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xl ring-2 ring-primary/20">
                                            {{ mb_substr($testimonial->client_name, 0, 1) }}
                                        </div>
                                    @endif
                                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-gray-900">{{ $testimonial->client_name }}</h4>
                                    <p class="text-sm text-primary font-medium">{{ $testimonial->role }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Swiper Pagination & Navigation --}}
            <div class="swiper-pagination !bottom-0"></div>
        </div>

        {{-- Custom Navigation Buttons (Optional Desktop) --}}
        <div class="hidden md:flex justify-center gap-4 mt-8 reveal">
            <button class="swiper-btn-prev w-12 h-12 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-500 hover:text-primary hover:border-primary hover:shadow-md transition-all duration-300 focus:outline-none">
                <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
            </button>
            <button class="swiper-btn-next w-12 h-12 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-500 hover:text-primary hover:border-primary hover:shadow-md transition-all duration-300 focus:outline-none">
                <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            </button>
        </div>

    </div>

    {{-- Swiper Initialization --}}
    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

        document.addEventListener('DOMContentLoaded', () => {
            const isRtl = document.documentElement.dir === 'rtl';

            new Swiper('.testimonials-swiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                grabCursor: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: '.swiper-btn-next',
                    prevEl: '.swiper-btn-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 24,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 32,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 32,
                    },
                }
            });
        });
    </script>
</section>
@endif