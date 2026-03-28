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

        @php
            $features = \App\Services\Frontend\FeatureService::getFeatures();
        @endphp

        {{-- Cards Grid --}}
        @if($features->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($features as $feature)
            @php
                // Generate a custom staggered delay multiplier to maintain cinematic cascading effect
                // E.g., item 1 -> delay-100, item 2 -> delay-200
                $delayClass = 'delay-' . (($loop->iteration % 3 == 0 ? 3 : $loop->iteration % 3) * 100);
                
                // Original behavior: Item 2 had secondary color, others primary.
                $isSecondary = ($loop->iteration % 2 === 0);
                
                $cardHoverBorder = $isSecondary ? 'hover:border-secondary/20' : 'hover:border-primary/20';
                
                if($altBg) {
                    $iconColorValue = 'text-white';
                } else {
                    $iconColorValue = $isSecondary ? 'text-secondary' : 'text-primary';
                }
                
                // Base colors override if AltBg is applied
                $cardBaseClasses = $altBg ? 'bg-white/5 border-white/10 hover:bg-white/10' : "bg-white border-gray-100 shadow-sm {$cardHoverBorder} hover:shadow-xl";
                
                $iconContainerBg = $altBg ? 'bg-white/20 group-hover:bg-white/30' : ($isSecondary ? 'bg-secondary/10 group-hover:bg-secondary/20' : 'bg-primary/10 group-hover:bg-primary/20');
            @endphp
            <div class="group p-8 rounded-2xl border transition-all duration-300 flex flex-col items-start {{ $cardBaseClasses }} reveal {{ $delayClass }}">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-6 transition {{ $iconContainerBg }}">
                    {!! str_replace('{colorClass}', $iconColorValue, $feature->icon) !!}
                </div>
                <h3 class="text-lg font-bold mb-3 {{ $altBg ? 'text-white' : 'text-primary' }}">{{ $feature->title }}</h3>
                <p class="text-sm leading-relaxed {{ $altBg ? 'text-white/70' : 'text-gray-500' }}">{{ $feature->description }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
