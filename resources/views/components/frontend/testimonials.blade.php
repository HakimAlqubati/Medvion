@if($testimonials->isNotEmpty())
<section id="testimonials"
    class="py-24 {{ $altBg ? 'bg-gray-50' : 'bg-white' }} relative overflow-hidden"
    style="content-visibility: auto; contain-intrinsic-size: 800px;">

    {{-- CSS for Swiper (loaded only when needed) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0" aria-hidden="true">
        <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-[100px] transform-gpu"></div>
        <div class="absolute top-[60%] -right-[10%] w-[40%] h-[40%] bg-secondary/5 rounded-full blur-[100px] transform-gpu"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-2xl mx-auto mb-20 reveal">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/5 text-primary text-sm font-semibold tracking-wide uppercase ring-1 ring-primary/10 mb-6">
                {{ __('land.testimonials_badge') ?? 'آراء العملاء' }}
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                {{ __('land.testimonials_title') ?? 'ماذا يقولون عنا' }}
            </h2>
            <p class="text-lg text-gray-500">
                {{ __('land.testimonials_subtitle') ?? 'اكتشف تأثير Medvion من خلال تجارب المتخصصين.' }}
            </p>
        </div>

        {{-- Swiper Slider --}}
        <div class="swiper testimonials-swiper reveal delay-100 !pb-16">
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                @php
                // تجنب الأخطاء البرمجية التي تستهلك موارد السيرفر في الـ Error Logging
                $name = $testimonial->client_name['ar'] ?? 'عميل';
                $role = $testimonial->role['ar'] ?? '';
                $content = $testimonial->content['ar'] ?? '';
                $rating = $testimonial->rating ?? 5;
                @endphp

                <div class="swiper-slide h-auto">
                    <div class="group relative bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:border-primary/20 transition-colors duration-300 flex flex-col justify-between h-full">

                        <div class="absolute top-6 right-8 text-primary/10">
                            <svg class="w-10 h-10 transform -scale-x-100" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                            </svg>
                        </div>

                        <div>
                            <div class="flex items-center gap-1 mb-6" aria-label="تقييم {{ $rating }} من 5">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-100' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    @endfor
                            </div>

                            <p class="text-gray-700 leading-relaxed mb-8 relative z-10 text-base lg:text-lg">
                                "{{ $content }}"
                            </p>
                        </div>

                        <div class="flex items-center gap-4 mt-auto pt-6 border-t border-gray-50/80">
                            @if($testimonial->avatar_image)
                            <img src="{{ asset($testimonial->avatar_image) }}"
                                alt="{{ $name }}"
                                class="w-12 h-12 rounded-full object-cover bg-gray-50"
                                loading="lazy"
                                decoding="async">
                            @else
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center text-primary font-bold text-lg ring-1 ring-primary/10">
                                {{ mb_substr($name, 0, 1) }}
                            </div>
                            @endif

                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-gray-900">{{ $name }}</span>
                                <span class="text-xs font-medium text-gray-500">{{ $role }}</span>
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
            new Swiper('.testimonials-swiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: false,
                grabCursor: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.testimonials-swiper .swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                breakpoints: {
                    640: { slidesPerView: 2, spaceBetween: 24 },
                    1024: { slidesPerView: 3, spaceBetween: 32 },
                }
            });
        });
    </script>
</section>
@endif