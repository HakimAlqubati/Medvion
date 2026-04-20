{{-- 
    Component: x-frontend.about
    Pure Presentational View: No Business Logic
--}}
<section id="about" class="py-20 md:py-32 {{ $altBg ? 'bg-gray-50' : 'bg-white' }} relative overflow-hidden">
    
    {{-- Lightweight Static Decorative Elements بدل التغبيش الثقيل (blur-3xl) --}}
    <div class="absolute inset-0 z-0 opacity-40 pointer-events-none">
        <svg class="absolute -top-24 -left-24 w-96 h-96 text-primary/5 transform -rotate-12" fill="currentColor" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="40" />
        </svg>
        <svg class="absolute bottom-[-10%] right-[-5%] w-[500px] h-[500px] text-secondary/5 transform rotate-45" fill="currentColor" viewBox="0 0 100 100">
            <rect x="10" y="10" width="80" height="80" rx="20"/>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            
            {{-- Text Content --}}
            <div class="order-2 lg:order-1 text-center lg:text-start reveal">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 border border-primary/20 text-primary mb-6 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                    <span class="text-xs sm:text-sm font-bold tracking-widest uppercase">{{ __('land.nav_about') }}</span>
                </div>
                
                <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-[1.2] mb-6">
                    {{ optional($summary)->title ?? __('land.about_section_title') }}
                </h2>
                
                <p class="text-lg md:text-xl text-gray-500 leading-relaxed max-w-2xl mx-auto lg:mx-0 mb-8">
                    {{ optional($summary)->content ?? __('land.about_section_subtitle') }}
                </p>
                
                <div>
                    <a href="{{ url('/about') }}" class="group inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-xl hover:-translate-y-0.5 hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 will-change-transform">
                        {{ __('land.about_section_button') }}
                        <svg class="w-5 h-5 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Image/Visual - Optimized Performance --}}
            <div class="order-1 lg:order-2 relative mx-auto w-full max-w-md lg:max-w-none reveal delay-100">
                
                {{-- Clean Structure بدل ظلال الـ blur --}}
                <div class="relative rounded-[2rem] overflow-hidden aspect-square lg:aspect-auto lg:h-[500px] border border-gray-100 bg-gray-50 flex items-center justify-center p-8 will-change-transform group transition-all duration-500 shadow-sm hover:shadow-md">
                    
                    {{-- Lightweight Gradient Pattern --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-secondary/10 group-hover:scale-105 transition-transform duration-700 ease-out"></div>
                    
                    {{-- Icon Container --}}
                    <div class="relative z-10 text-primary opacity-90 transition-transform duration-700 ease-out group-hover:scale-110">
                        <svg class="w-48 h-48 md:w-64 md:h-64" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 11h-6V5a1 1 0 00-2 0v6H5a1 1 0 000 2h6v6a1 1 0 002 0v-6h6a1 1 0 000-2z" />
                        </svg>
                    </div>

                    {{-- Small floating card (تخفيف التعقيد البصري وحركة الصعود المستمرة للحفاظ على الـ GPU) --}}
                    <div class="absolute bottom-6 left-6 md:bottom-10 md:left-10 bg-white p-4 sm:p-5 rounded-2xl shadow-lg border border-gray-100 flex items-center gap-4 transition-transform duration-500 hover:-translate-y-2 will-change-transform">
                        <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm md:text-base leading-tight">{{ __('land.about_section_badge') }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
