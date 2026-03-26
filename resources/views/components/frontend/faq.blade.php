{{-- FAQ Section --}}
<section class="py-20 bg-gray-50" id="faq">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-14">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-primary">
                {{ __('land.faq_heading') }}
            </h2>
            <p class="mt-4 text-gray-500 text-base">
                {{ __('land.faq_subheading') }}
            </p>
        </div>

        {{-- Accordion --}}
        <div x-data="{ active: null }" class="space-y-4">

            @foreach([
                ['q' => __('land.faq_1_q'), 'a' => __('land.faq_1_a')],
                ['q' => __('land.faq_2_q'), 'a' => __('land.faq_2_a')],
                ['q' => __('land.faq_3_q'), 'a' => __('land.faq_3_a')],
                ['q' => __('land.faq_4_q'), 'a' => __('land.faq_4_a')],
                ['q' => __('land.faq_5_q'), 'a' => __('land.faq_5_a')],
            ] as $index => $item)

                <div
                    x-data
                    class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                    {{-- Question (Toggle Button) --}}
                    <button
                        @click="active === {{ $index }} ? active = null : active = {{ $index }}"
                        class="w-full flex items-center justify-between px-6 py-5 text-start gap-4 hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-800 text-sm sm:text-base">
                            {{ $item['q'] }}
                        </span>
                        <span class="shrink-0 w-8 h-8 flex items-center justify-center rounded-full border border-gray-200 text-primary transition-transform duration-300"
                              :class="active === {{ $index }} ? 'bg-primary text-white border-primary rotate-45' : ''">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                    </button>

                    {{-- Answer --}}
                    <div
                        x-show="active === {{ $index }}"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-cloak>
                        <div class="px-6 pb-5 text-gray-500 text-sm leading-relaxed border-t border-gray-100 pt-4">
                            {{ $item['a'] }}
                        </div>
                    </div>

                </div>

            @endforeach

        </div>
    </div>
</section>
