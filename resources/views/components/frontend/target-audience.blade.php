@props(['audiences'])

@if($audiences && $audiences->count() > 0)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal">
            <h2 class="text-3xl font-extrabold text-primary">{{ __('land.about_audience_title') }}</h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">{{ __('land.about_audience_subtitle') }}</p>
        </div>
        <div class="flex flex-wrap justify-center gap-4">
            @foreach($audiences as $audience)
                <div class="px-6 py-4 bg-primary/5 text-primary rounded-xl font-medium border border-primary/10 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-300 flex items-center reveal delay-{{ ($loop->iteration % 4 == 0 ? 4 : $loop->iteration % 4) * 100 }}">
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    {{ $audience->title }}
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
