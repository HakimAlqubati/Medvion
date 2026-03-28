@props(['altBg' => false, 'faqs' => null])

@php
    $faqs = $faqs ?? app(\App\Services\Frontend\FaqService::class)->getActiveFaqs();
@endphp

{{-- FAQ Section --}}
<section id="faq" class="py-20 {{ $altBg ? 'bg-primary' : 'bg-white' }} relative overflow-hidden">

    {{-- Decorative Background Image (Only when altBg is true) --}}
    @if($altBg)
        <style>
            @keyframes breatheFadeFaq {
                0%, 100% { opacity: 0.03; transform: scale(1.05) translateY(0); }
                50% { opacity: 0.12; transform: scale(1) translateY(10px); }
            }
            .animate-breathe-faq {
                animation: breatheFadeFaq 18s ease-in-out infinite;
            }
        </style>
    @endif
    <style>
        /* --- Accordion Answer Transition --- */
        @keyframes faqAnswerIn {
            0%   { opacity: 0; transform: translateY(-12px) scaleY(0.9); filter: blur(4px); max-height: 0; }
            50%  { opacity: 0.8; filter: blur(0); }
            100% { opacity: 1; transform: translateY(0) scaleY(1); filter: blur(0); max-height: 600px; }
        }
        @keyframes faqAnswerOut {
            0%   { opacity: 1; transform: translateY(0) scaleY(1); max-height: 600px; }
            100% { opacity: 0; transform: translateY(-8px) scaleY(0.95); max-height: 0; }
        }
        .faq-answer-enter {
            animation: faqAnswerIn 0.55s cubic-bezier(0.34, 1.4, 0.64, 1) forwards;
            overflow: hidden;
            transform-origin: top center;
        }
        .faq-answer-leave {
            animation: faqAnswerOut 0.3s cubic-bezier(0.4, 0, 0.6, 1) forwards;
            overflow: hidden;
            transform-origin: top center;
        }

        /* --- FAQ Item Stagger Entrance (alternating directions) --- */
        .faq-item {
            opacity: 0;
            filter: blur(10px);
            transition:
                opacity   0.8s cubic-bezier(0.16, 1, 0.3, 1),
                transform 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                filter    0.65s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity, filter;
        }
        /* Even  → flies in from FAR RIGHT (off-screen) */
        .faq-from-right {
            transform: translateX(120vw) scale(0.82) rotate(3deg);
            transform-origin: left center;
        }
        /* Odd → flies in from FAR LEFT (off-screen) */
        .faq-from-left {
            transform: translateX(-120vw) scale(0.82) rotate(-3deg);
            transform-origin: right center;
        }
        .faq-item.faq-visible {
            opacity: 1;
            transform: translateX(0) scale(1) rotate(0deg);
            filter: blur(0px);
        }
    </style>
    @if($altBg)
        <div class="absolute inset-0 z-0 pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=2000&q=80" 
                 alt="الأسئلة الشائعة خلفية" 
                 class="w-full h-full object-cover animate-breathe-faq">
        </div>
        {{-- Gradient top and bottom for smooth text transition, keeping it rich --}}
        <div class="absolute inset-0 z-0 bg-gradient-to-t from-primary via-transparent to-primary opacity-60 pointer-events-none"></div>
    @endif
    
    {{-- Decorative Background Blob (اختياري للمسة عصرية) --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] {{ $altBg ? 'bg-white/5' : 'bg-primary/5' }} blur-[80px] rounded-full pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- Section Header --}}
        <div class="text-center mb-16 reveal">
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
        <div x-data="{ activeAccordion: null }" id="faq-accordion" class="space-y-5">

            @foreach($faqs as $index => $item)

                {{-- Accordion Item --}}
                <div
                    class="faq-item {{ $index % 2 === 0 ? 'faq-from-right' : 'faq-from-left' }} group rounded-2xl border transition-all duration-300 ease-in-out cursor-pointer {{ $altBg ? 'bg-white/5' : 'bg-white' }}"
                    style="--faq-delay: {{ $index * 160 }}ms"
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
                            {{ $item->question }}
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
                        x-transition:enter="faq-answer-enter"
                        x-transition:leave="faq-answer-leave"
                        style="overflow: hidden;"
                        x-cloak>

                        <div
                            class="px-6 pb-6 pt-1 text-base leading-relaxed sm:px-6 {{ $altBg ? 'text-white/90' : 'text-gray-500' }}"
                            x-show="activeAccordion === {{ $index }}"
                            x-transition:enter="transition-all ease-[cubic-bezier(0.34,1.4,0.64,1)] duration-500 delay-75"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition-all ease-in duration-150"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            x-cloak>
                            {{-- خط جانبي لربط الإجابة بصرياً --}}
                            <p class="ps-4 border-s-2 {{ $altBg ? 'border-white/30' : 'border-secondary/50' }}">
                                {{ $item->answer }}
                            </p>
                        </div>
                    </div>

                </div>

            @endforeach

        </div>
    </div>

    {{-- FAQ Stagger Animation --}}
    <script>
        (function () {
            var pendingTimers = [];

            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        /* Reset & re-animate every time */
                        const items = entry.target.querySelectorAll('.faq-item');

                        /* Cancel any running timers first */
                        pendingTimers.forEach(clearTimeout);
                        pendingTimers = [];

                        /* Strip only faq-visible (keep direction class) — no transition flash */
                        items.forEach(function (item) {
                            item.style.transition = 'none';
                            item.classList.remove('faq-visible');
                        });

                        /* Force reflow so CSS direction transform re-applies */
                        void entry.target.offsetHeight;

                        /* Re-apply transitions then stagger in */
                        items.forEach(function (item) {
                            item.style.transition = '';
                            const delay = parseInt(item.style.getPropertyValue('--faq-delay')) || 0;
                            const t = setTimeout(function () {
                                item.classList.add('faq-visible');
                            }, delay + 100);
                            pendingTimers.push(t);
                        });
                    }
                });
            }, { threshold: 0.12 });

            document.addEventListener('DOMContentLoaded', function () {
                const container = document.getElementById('faq-accordion');
                if (container) observer.observe(container);
            });
        })();
    </script>
</section>