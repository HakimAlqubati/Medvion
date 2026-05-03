<x-layouts.frontend :title="__('errors.404_title')">
    <section class="min-h-[90svh] flex flex-col justify-center items-center relative overflow-hidden bg-white pt-24 pb-16">
        
        {{-- Background decorative elements (Lightweight & Theme-matched) --}}
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute -top-32 -start-32 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 -end-32 w-96 h-96 bg-secondary/5 rounded-full blur-3xl"></div>
            <!-- Primary Color Dots Pattern -->
            <div class="absolute inset-0" style="background-image: radial-gradient(circle, rgba(26,82,206,0.03) 1px, transparent 1px); background-size: 32px 32px;"></div>
        </div>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            
            {{-- Creative 404 Visual with Medical/Health Touch --}}
            <div class="relative mb-8 md:mb-12 inline-block">
                
                {{-- Heartbeat / Pulse abstract vector behind the text --}}
                <svg class="absolute -top-8 -left-12 sm:-top-12 sm:-left-20 w-32 h-32 sm:w-48 sm:h-48 text-secondary/10 -z-10 animate-pulse" style="animation-duration: 3s;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h3l3.5-7 5 14 3.5-7h3" />
                </svg>

                {{-- The 404 Text Gradient --}}
                <h1 class="text-[8rem] sm:text-[12rem] font-black leading-none tracking-tighter text-transparent bg-clip-text bg-gradient-to-br from-primary to-secondary drop-shadow-sm select-none">
                    404
                </h1>
                
                {{-- Floating Medical/Error Icon --}}
                <div class="absolute top-1/4 -right-4 sm:-right-12 w-14 h-14 sm:w-16 sm:h-16 bg-white rounded-full shadow-xl border border-gray-50 flex items-center justify-center animate-bounce" style="animation-duration: 2.5s;">
                    <svg class="w-7 h-7 sm:w-8 sm:h-8 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>

            {{-- Text Content --}}
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">
                {{ __('errors.page_not_found') }}
            </h2>
            <p class="text-base sm:text-lg text-gray-500 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
                {{ __('errors.page_not_found_desc') }}
            </p>

            {{-- Action Buttons --}}
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ url('/') }}" class="group w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-gradient-to-br from-primary to-primary-dark text-white font-bold rounded-xl shadow-lg shadow-primary/20 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                    <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1 rtl:group-hover:translate-x-1 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    {{ __('errors.go_home') }}
                </a>

                <a href="{{ url('/contact') }}" class="group w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-gray-700 border border-gray-200 font-bold rounded-xl shadow-sm hover:border-gray-300 hover:bg-gray-50 hover:-translate-y-0.5 transition-all duration-300">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-secondary transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    {{ __('errors.contact_support') }}
                </a>
            </div>
        </div>
    </section>
</x-layouts.frontend>
