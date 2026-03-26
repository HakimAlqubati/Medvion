@props(['altBg' => false])

{{-- FAQ Section - Modern UI Redesign --}}
<section class="py-24 {{ $altBg ? 'bg-primary' : 'bg-white' }} relative overflow-hidden" id="faq">
    
    {{-- Decorative Background Blob (اختياري للمسة عصرية) --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] {{ $altBg ? 'bg-white/5' : 'bg-primary/5' }} blur-[80px] rounded-full pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- Section Header --}}
        <div class="text-center mb-16">
            <span class="inline-block py-1.5 px-4 rounded-full {{ $altBg ? 'bg-white/10 text-white' : 'bg-secondary/10 text-secondary' }} font-bold text-sm mb-4 tracking-wide">
                الدعم والمساعدة
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold {{ $altBg ? 'text-white' : 'text-gray-900' }}">
                {{ __('land.faq_heading') }}
            </h2>
            <p class="mt-5 {{ $altBg ? 'text-white/70' : 'text-gray-500' }} text-lg max-w-2xl mx-auto">
                {{ __('land.faq_subheading') }}
            </p>
        </div>

        {{-- Accordion Container --}}
        <div x-data="{ activeAccordion: null }" class="space-y-5">

            @foreach([
                ['q' => __('land.faq_1_q'), 'a' => __('land.faq_1_a')],
                ['q' => __('land.faq_2_q'), 'a' => __('land.faq_2_a')],
                ['q' => __('land.faq_3_q'), 'a' => __('land.faq_3_a')],
                ['q' => __('land.faq_4_q'), 'a' => __('land.faq_4_a')],
                ['q' => __('land.faq_5_q'), 'a' => __('land.faq_5_a')],
            ] as $index => $item)

                {{-- Accordion Item --}}
                <div
                    class="group rounded-2xl border transition-all duration-300 ease-in-out cursor-pointer {{ $altBg ? 'bg-white/5' : 'bg-white' }}"
                    :class="activeAccordion === {{ $index }} ? '{{ $altBg ? 'border-white/30 shadow-lg shadow-black/10 bg-white/10' : 'border-primary shadow-lg shadow-primary/5' }}' : '{{ $altBg ? 'border-white/10 shadow-sm hover:border-white/30 hover:bg-white/10' : 'border-gray-100 shadow-sm hover:border-primary/30 hover:shadow-md' }}'"
                >
                    {{-- Question (Toggle Button) --}}
                    <button
                        @click="activeAccordion === {{ $index }} ? activeAccordion = null : activeAccordion = {{ $index }}"
                        class="w-full flex items-center justify-between px-6 py-5 sm:p-6 text-start focus:outline-none"
                    >
                        <span
                            class="font-bold text-base sm:text-lg transition-colors duration-200"
                            :class="activeAccordion === {{ $index }} ? '{{ $altBg ? 'text-white' : 'text-primary' }}' : '{{ $altBg ? 'text-white/80 group-hover:text-white' : 'text-gray-800 group-hover:text-primary' }}'"
                        >
                            {{ $item['q'] }}
                        </span>

                        {{-- Animated Chevron Icon --}}
                        <span
                            class="ms-4 shrink-0 flex items-center justify-center w-10 h-10 rounded-full transition-all duration-300"
                            :class="activeAccordion === {{ $index }} ? '{{ $altBg ? 'bg-white text-primary' : 'bg-primary text-white' }}' : '{{ $altBg ? 'bg-white/10 text-white/80 group-hover:bg-white/20 group-hover:text-white' : 'bg-gray-50 text-gray-400 group-hover:bg-primary/10 group-hover:text-primary' }}'"
                        >
                            <svg class="w-5 h-5 transition-transform duration-300"
                                 :class="activeAccordion === {{ $index }} ? 'rotate-180' : ''"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>

                    {{-- Answer Content --}}
                    <div
                        x-show="activeAccordion === {{ $index }}"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="overflow-hidden"
                        x-cloak>
                        
                        <div class="px-6 pb-6 pt-1 text-base leading-relaxed sm:px-6 {{ $altBg ? 'text-white/70' : 'text-gray-500' }}">
                            {{-- إضافة خط جانبي بلون المنصة الثانوي لربط الإجابة بصرياً --}}
                            <p class="ps-4 border-s-2 {{ $altBg ? 'border-white/30' : 'border-secondary/50' }}">
                                {{ $item['a'] }}
                            </p>
                        </div>
                    </div>

                </div>

            @endforeach

        </div>
    </div>
</section>