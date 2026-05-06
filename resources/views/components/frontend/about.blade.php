{{-- 
    Component: x-frontend.about
    Pure Presentational View: No Business Logic
--}}
<section id="about" class="py-20 md:py-32 {{ $altBg ? 'bg-gray-50' : 'bg-white' }} relative overflow-hidden">
    
    {{-- Decorative elements cleaned up --}}

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
                <div class="animate-gpu-float animate-delay-2000 relative rounded-[2rem] overflow-hidden aspect-square lg:aspect-auto lg:h-[500px] border border-gray-100 bg-gray-50 flex items-center justify-center p-8 will-change-transform group transition-all duration-500 shadow-sm hover:shadow-md">
                    
                    {{-- Lightweight Gradient Pattern --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-secondary/10 group-hover:scale-105 transition-transform duration-700 ease-out"></div>
                    
                    {{-- Main Visual: Dynamic Image or SVG Placeholder --}}
                    <div class="relative z-10 w-full h-full flex items-center justify-center transition-transform duration-700 ease-out group-hover:scale-105">
                        @if(optional($summary)->image)
                            <img src="{{ Storage::disk('public')->url($summary->image) }}" 
                                 class="w-full h-full object-cover rounded-[1.5rem] shadow-2xl" 
                                 alt="{{ $summary->title }}">
                        @else
                            {{-- Lightweight Medical SVG Placeholder --}}
                            <svg class="w-48 h-48 md:w-64 md:h-64 text-primary/10" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/>
                            </svg>
                        @endif
                    </div>

                    {{-- Small floating card --}}
                    <div class="animate-gpu-float-badge absolute bottom-6 left-6 md:bottom-10 md:left-10 z-20">
                        <div class="bg-white p-4 sm:p-5 rounded-2xl shadow-lg border border-gray-100 flex items-center gap-4 transition-transform duration-500 hover:-translate-y-2 will-change-transform">
                            <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center shrink-0 p-2.5">
                                <svg class="w-full h-full text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
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
    </div>
</section>

@push('styles')
<style>
    @keyframes gpu-float {
        0%, 100% { transform: translate3d(0, 0, 0) rotate(var(--tw-rotate, 0)); }
        50% { transform: translate3d(0, -15px, 0) rotate(var(--tw-rotate, 0)); }
    }
    
    .animate-gpu-float {
        animation: gpu-float 6s ease-in-out infinite;
        will-change: transform;
    }

    @keyframes gpu-float-badge {
        0%, 100% { transform: translate3d(0, 0, 0); }
        50% { transform: translate3d(0, -10px, 0); }
    }
    
    .animate-gpu-float-badge {
        animation: gpu-float-badge 4s ease-in-out infinite;
        will-change: transform;
    }

    .animate-delay-1000 { animation-delay: -1s; }
    .animate-delay-2000 { animation-delay: -2s; }
    .animate-duration-7000 { animation-duration: 7s; }

    .animate-gpu-float, .animate-gpu-float-badge {
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }
</style>
@endpush
