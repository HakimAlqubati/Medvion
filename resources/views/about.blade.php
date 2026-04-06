<x-layouts.frontend :title="($page_hero->title ?? __('land.about_page_title')) . ' | منصة Medvion'">

    {{-- About Hero --}}
    <section class="relative bg-gradient-to-br from-primary-dark via-primary to-primary-light text-white pt-44 pb-20 lg:pt-52 lg:pb-28">
        <div class="absolute inset-0 opacity-10"
             style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">{{ $page_hero->title ?? __('land.about_hero_title') }}</h1>
            <p class="text-white/75 text-lg max-w-2xl mx-auto">{{ $page_hero->content ?? __('land.about_hero_subtitle') }}</p>
        </div>
    </section>

    {{-- Platform Definition --}}
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start gap-8">
                <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center shrink-0">
                    <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="{{ optional($definition)->icon ?? 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' }}" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-primary mb-4">{{ optional($definition)->title ?? __('land.about_definition_title') }}</h2>
                    <p class="text-gray-600 leading-relaxed text-base">{{ optional($definition)->content ?? __('land.about_definition_body') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Vision & Mission --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- Vision --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if(optional($vision)->icon)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $vision->icon }}" />
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            @endif
                        </svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-primary mb-3">{{ optional($vision)->title ?? __('land.about_vision_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">{{ optional($vision)->content ?? __('land.about_vision_body') }}</p>
                </div>

                {{-- Mission --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="{{ optional($mission)->icon ?? 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z' }}" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-primary mb-3">{{ optional($mission)->title ?? __('land.about_mission_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">{{ optional($mission)->content ?? __('land.about_mission_body') }}</p>
                </div>

            </div>
        </div>
    </section>

    {{-- Values --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-primary">{{ __('land.about_values_title') }}</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($values ?? collect() as $value)
                    <div class="p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition text-center">
                        <div class="w-12 h-12 mx-auto rounded-xl mb-4 flex items-center justify-center
                                    {{ $value->color === 'secondary' ? 'bg-secondary/10' : 'bg-primary/10' }}">
                            <svg class="w-6 h-6 {{ $value->color === 'secondary' ? 'text-secondary' : 'text-primary' }}"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $value->icon }}" />
                            </svg>
                        </div>
                        <h4 class="font-extrabold text-primary mb-2">{{ $value->title }}</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $value->content }}</p>
                    </div>
                @empty
                    <div class="col-span-4 text-center text-gray-500">لا توجد سجلات حالياً</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- New Sections Data passed from Controller --}}
    <x-frontend.goals :goals="$goals ?? null" />
    <x-frontend.target-audience :audiences="$audiences ?? null" />
    <x-frontend.team :members="$teamMembers ?? null" />
    <x-frontend.impacts :impacts="$impacts ?? null" />

</x-layouts.frontend>
