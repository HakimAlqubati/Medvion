@props(['impacts'])

@if($impacts && $impacts->count() > 0)
<section class="relative py-20 bg-gradient-to-br from-primary-dark to-primary overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <h2 class="text-3xl font-extrabold text-white">{{ __('land.about_impact_title') }}</h2>
            <p class="mt-4 text-primary-light text-lg max-w-2xl mx-auto opacity-90">{{ __('land.about_impact_subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($impacts as $index => $impact)
                <div class="relative bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 text-center hover:bg-white/20 transition duration-300 reveal delay-{{ ($loop->iteration % 4 == 0 ? 4 : $loop->iteration % 4) * 100 }}">
                    <div class="w-14 h-14 mx-auto bg-gradient-to-br from-secondary to-secondary-light rounded-xl flex items-center justify-center shadow-lg mb-6 -mt-12">
                        <!-- Dynamic or static icon -->
                        <span class="text-white font-extrabold text-xl">{{ $index + 1 }}</span>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2 leading-tight">{{ $impact->content }}</h4>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
