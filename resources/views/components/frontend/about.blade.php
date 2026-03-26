<section id="about" class="py-20 md:py-32 bg-white relative overflow-hidden">
    {{-- Decorative Background --}}
    <div class="absolute inset-0 z-0 opacity-30 pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-full max-w-lg h-96 bg-secondary/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            
            {{-- Text Content --}}
            <div class="order-2 lg:order-1 text-center lg:text-start">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary mb-6">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    <span class="text-sm font-bold tracking-wide uppercase">{{ __('land.nav_about') }}</span>
                </div>
                
                <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                    {{ __('land.about_section_title') }}
                </h2>
                
                <p class="text-lg md:text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto lg:mx-0 mb-8">
                    {{ __('land.about_section_subtitle') }}
                </p>
                
                <div>
                    <a href="{{ url('/about') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:shadow-xl hover:-translate-y-1 hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all duration-300">
                        {{ __('land.about_section_button') }}
                        {{-- Arrow Icon RTL adaptive --}}
                        <svg class="w-5 h-5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Image/Visual --}}
            <div class="order-1 lg:order-2 relative mx-auto w-full max-w-md lg:max-w-none">
                {{-- Abstract Shapes / Image Wrapper --}}
                <div class="relative rounded-3xl overflow-hidden aspect-square lg:aspect-auto lg:h-[500px] shadow-2xl border border-gray-100 bg-gray-50 flex items-center justify-center p-8 group hover:shadow-primary/20 transition-all duration-700">
                    {{-- Decorative pattern --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-secondary/10 group-hover:scale-105 transition-transform duration-700"></div>
                    
                    {{-- Plus Sign representing medical/Medvion+ --}}
                    <div class="relative z-10 text-primary opacity-90 transition-transform duration-700 group-hover:scale-110">
                        <svg class="w-48 h-48 md:w-64 md:h-64" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 11h-6V5a1 1 0 00-2 0v6H5a1 1 0 000 2h6v6a1 1 0 002 0v-6h6a1 1 0 000-2z" />
                        </svg>
                    </div>

                    {{-- Small floating card --}}
                    <div class="absolute bottom-6 left-6 md:bottom-10 md:left-10 bg-white p-4 rounded-2xl shadow-xl flex items-center gap-4 animate-bounce hover:animate-none transition-all duration-500" style="animation-duration: 3s;">
                        <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm md:text-base pr-8 rtl:pr-0 rtl:pl-8 whitespace-nowrap">{{ __('land.about_section_badge') }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
