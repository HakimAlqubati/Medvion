@props(['members'])

@if($members && $members->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal">
            <h2 class="text-3xl font-extrabold text-primary">{{ __('land.about_team_title') }}</h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">{{ __('land.about_team_subtitle') }}</p>
        </div>
        <div class="flex justify-center">
            @foreach($members as $member)
                <div class="bg-white rounded-2xl shadow-sm border border-primary/20 overflow-hidden w-full max-w-sm text-center reveal delay-{{ ($loop->iteration % 3 == 0 ? 3 : $loop->iteration % 3) * 100 }}">
                    <div class="h-32 bg-primary"></div>
                     <div class="relative px-6 pb-6">
                        <div class="w-24 h-24 mx-auto rounded-full bg-gray-100 border-4 border-white shadow -mt-12 overflow-hidden flex items-center justify-center">
                             @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                             @else
                                <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                             @endif
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-primary">{{ $member->name }}</h3>
                        <p class="text-secondary font-medium mt-1">{{ $member->role }}</p>
                        @if($member->bio)
                             <p class="text-gray-500 text-sm mt-4 leading-relaxed line-clamp-4">{{ $member->bio }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
