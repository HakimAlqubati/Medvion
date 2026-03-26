@props(['altBg' => false])

{{-- Features Section --}}
<section class="py-20 {{ $altBg ? 'bg-primary' : 'bg-white' }} relative overflow-hidden">
    
    {{-- Decorative Background Image (Only when altBg is true) --}}
    @if($altBg)
        <style>
            @keyframes breatheFade {
                0%, 100% { opacity: 0.04; transform: scale(1.05); }
                50% { opacity: 0.12; transform: scale(1); }
            }
            .animate-breathe-fade {
                animation: breatheFade 14s ease-in-out infinite;
            }
        </style>
        <div class="absolute inset-0 z-0 pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=2000&q=80" 
                 alt="Medical Background" 
                 class="w-full h-full object-cover animate-breathe-fade">
        </div>
        {{-- Gradient Overlay for better text readability at edges --}}
        <div class="absolute inset-0 z-0 bg-gradient-to-t from-primary via-transparent to-primary opacity-60 pointer-events-none"></div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-14 reveal">
            <h2 class="text-3xl sm:text-4xl font-extrabold {{ $altBg ? 'text-white' : 'text-primary' }}">
                {{ __('land.features_heading') }}
            </h2>
            <p class="mt-4 text-base leading-relaxed {{ $altBg ? 'text-white/70' : 'text-gray-500' }}">
                {{ __('land.features_subheading') }}
            </p>
        </div>

        {{-- Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Feature 1 --}}
            <div class="group p-8 rounded-2xl border transition-all duration-300 flex flex-col items-start {{ $altBg ? 'bg-white/5 border-white/10 hover:bg-white/10' : 'bg-white border-gray-100 shadow-sm hover:border-primary/20 hover:shadow-xl' }} reveal delay-100">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-6 transition {{ $altBg ? 'bg-white/20 group-hover:bg-white/30' : 'bg-primary/10 group-hover:bg-primary/20' }}">
                    <svg class="w-7 h-7 {{ $altBg ? 'text-white' : 'text-primary' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3 {{ $altBg ? 'text-white' : 'text-primary' }}">{{ __('land.feature_1_title') }}</h3>
                <p class="text-sm leading-relaxed {{ $altBg ? 'text-white/70' : 'text-gray-500' }}">{{ __('land.feature_1_desc') }}</p>
            </div>

            {{-- Feature 2 --}}
            <div class="group p-8 rounded-2xl border transition-all duration-300 flex flex-col items-start {{ $altBg ? 'bg-white/5 border-white/10 hover:bg-white/10' : 'bg-white border-gray-100 shadow-sm hover:border-secondary/20 hover:shadow-xl' }} reveal delay-200">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-6 transition {{ $altBg ? 'bg-white/20 group-hover:bg-white/30' : 'bg-secondary/10 group-hover:bg-secondary/20' }}">
                    <svg class="w-7 h-7 {{ $altBg ? 'text-white' : 'text-secondary' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3 {{ $altBg ? 'text-white' : 'text-primary' }}">{{ __('land.feature_2_title') }}</h3>
                <p class="text-sm leading-relaxed {{ $altBg ? 'text-white/70' : 'text-gray-500' }}">{{ __('land.feature_2_desc') }}</p>
            </div>

            {{-- Feature 3 --}}
            <div class="group p-8 rounded-2xl border transition-all duration-300 flex flex-col items-start {{ $altBg ? 'bg-white/5 border-white/10 hover:bg-white/10' : 'bg-white border-gray-100 shadow-sm hover:border-primary/20 hover:shadow-xl' }} reveal delay-300">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-6 transition {{ $altBg ? 'bg-white/20 group-hover:bg-white/30' : 'bg-primary/10 group-hover:bg-primary/20' }}">
                    <svg class="w-7 h-7 {{ $altBg ? 'text-white' : 'text-primary' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3 {{ $altBg ? 'text-white' : 'text-primary' }}">{{ __('land.feature_3_title') }}</h3>
                <p class="text-sm leading-relaxed {{ $altBg ? 'text-white/70' : 'text-gray-500' }}">{{ __('land.feature_3_desc') }}</p>
            </div>

        </div>
    </div>
</section>
