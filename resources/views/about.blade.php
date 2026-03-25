<x-layouts.frontend :title="__('land.about_page_title')">

    {{-- About Hero --}}
    <section class="relative bg-gradient-to-br from-primary-dark via-primary to-primary-light text-white py-20">
        <div class="absolute inset-0 opacity-10"
             style="background-image: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">{{ __('land.about_hero_title') }}</h1>
            <p class="text-white/75 text-lg max-w-2xl mx-auto">{{ __('land.about_hero_subtitle') }}</p>
        </div>
    </section>

    {{-- Platform Definition --}}
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start gap-8">
                <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center shrink-0">
                    <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-primary mb-4">{{ __('land.about_definition_title') }}</h2>
                    <p class="text-gray-600 leading-relaxed text-base">{{ __('land.about_definition_body') }}</p>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-primary mb-3">{{ __('land.about_vision_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">{{ __('land.about_vision_body') }}</p>
                </div>

                {{-- Mission --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-primary mb-3">{{ __('land.about_mission_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">{{ __('land.about_mission_body') }}</p>
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
                @foreach([
                    ['title' => __('land.about_value_1_title'), 'desc' => __('land.about_value_1_desc'), 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'primary'],
                    ['title' => __('land.about_value_2_title'), 'desc' => __('land.about_value_2_desc'), 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'color' => 'secondary'],
                    ['title' => __('land.about_value_3_title'), 'desc' => __('land.about_value_3_desc'), 'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'primary'],
                    ['title' => __('land.about_value_4_title'), 'desc' => __('land.about_value_4_desc'), 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'color' => 'secondary'],
                ] as $value)
                    <div class="p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition text-center">
                        <div class="w-12 h-12 mx-auto rounded-xl mb-4 flex items-center justify-center
                                    {{ $value['color'] === 'secondary' ? 'bg-secondary/10' : 'bg-primary/10' }}">
                            <svg class="w-6 h-6 {{ $value['color'] === 'secondary' ? 'text-secondary' : 'text-primary' }}"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $value['icon'] }}" />
                            </svg>
                        </div>
                        <h4 class="font-extrabold text-primary mb-2">{{ $value['title'] }}</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $value['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.frontend>
