@props(['goals'])

@if($goals && $goals->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal">
            <h2 class="text-3xl font-extrabold text-primary">{{ __('land.about_goals_title') }}</h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">{{ __('land.about_goals_subtitle') }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($goals as $goal)
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-start space-x-4 space-x-reverse reveal delay-{{ ($loop->iteration % 3 == 0 ? 3 : $loop->iteration % 3) * 100 }}">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center">
                            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- Simple Check circle -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-primary mb-1">{{ $goal->title }}</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $goal->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
