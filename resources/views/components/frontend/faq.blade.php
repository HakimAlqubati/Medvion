@props(['altBg' => false, 'faqs' => null])


{{-- FAQ Section --}}
<section id="faq" class="{{ $altBg ? 'bg-primary' : 'bg-white' }} py-20 relative overflow-hidden">

    {{-- Decorative blob: CSS-only, no GPU blur cost on scroll --}}
    <div
        class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] {{ $altBg ? 'bg-white/5' : 'bg-primary/5' }} blur-[80px] rounded-full pointer-events-none"
        aria-hidden="true"></div>

    @if($altBg)
    {{-- Decorative background image:
         - lazy + async: لا تُحمَّل إلا عند الاقتراب
         - أبعاد صريحة: تمنع CLS
         - opacity منخفضة: تقلل الـ compositing cost
    --}}
    <div class="absolute inset-0 z-0 pointer-events-none mix-blend-overlay opacity-[0.07]" aria-hidden="true">
        <img
            src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=1600&q=60"
            alt=""
            width="1600"
            height="900"
            loading="lazy"
            decoding="async"
            class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 z-0 bg-gradient-to-t from-primary via-transparent to-primary opacity-60 pointer-events-none" aria-hidden="true"></div>
    @endif

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
        <div x-data="{ activeAccordion: null }" id="faq-accordion" class="space-y-4">

            @foreach($faqs as $index => $item)

            {{--
                faq-from-right → العناصر الزوجية تدخل من اليمين
                faq-from-left  → العناصر الفردية تدخل من اليسار
                القيمة 80px بدلاً من 120vw: نفس التأثير البصري، بدون layout overflow
                الـ overflow-hidden على الـ section يمنع أي scrollbar جانبي
            --}}
            <div
                class="faq-item {{ (int)$index % 2 === 0 ? 'faq-from-right' : 'faq-from-left' }} group rounded-2xl border cursor-pointer {{ $altBg ? 'bg-white/5' : 'bg-white' }}"
                style="--faq-delay: {{ (int)$index * 90 }}ms"
                :class="activeAccordion === {{ $index }}
                    ? '{{ $altBg ? 'border-white/30 shadow-lg shadow-black/10 bg-white/10' : 'border-primary shadow-lg shadow-primary/5' }}'
                    : '{{ $altBg ? 'border-white/10 shadow-sm hover:border-white/30 hover:bg-white/10' : 'border-gray-100 shadow-sm hover:border-primary/30 hover:shadow-md' }}'">
                {{-- Question (Toggle Button) --}}
                <button
                    @click="activeAccordion === {{ $index }} ? activeAccordion = null : activeAccordion = {{ $index }}"
                    class="w-full flex items-center justify-between px-6 py-5 sm:p-6 text-start focus:outline-none"
                    :aria-expanded="activeAccordion === {{ $index }}">
                    <span
                        class="font-bold text-base sm:text-lg transition-colors duration-200"
                        :class="activeAccordion === {{ $index }}
                            ? '{{ $altBg ? 'text-white' : 'text-primary' }}'
                            : '{{ $altBg ? 'text-white/80 group-hover:text-white' : 'text-gray-800 group-hover:text-primary' }}'">
                       
                             {{ $item->question }}
                    </span>

                    {{-- Chevron --}}
                    <span
                        class="ms-4 shrink-0 flex items-center justify-center w-10 h-10 rounded-full transition-all duration-300"
                        :class="activeAccordion === {{ $index }}
                            ? '{{ $altBg ? 'bg-white text-primary' : 'bg-primary text-white' }}'
                            : '{{ $altBg ? 'bg-white/10 text-white/80 group-hover:bg-white/20 group-hover:text-white' : 'bg-gray-50 text-gray-400 group-hover:bg-primary/10 group-hover:text-primary' }}'"
                        aria-hidden="true">
                        <svg
                            class="w-5 h-5 transition-transform duration-300"
                            :class="activeAccordion === {{ $index }} ? 'rotate-180' : ''"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>

                {{-- Answer Content --}}
                <div
                    x-show="activeAccordion === {{ $index }}"
                    x-transition:enter="transition-all ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition-all ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="overflow-hidden"
                    x-cloak>
                    <div class="px-6 pb-6 pt-1 text-base leading-relaxed {{ $altBg ? 'text-white/90' : 'text-gray-500' }}">
                        <p class="ps-4 border-s-2 {{ $altBg ? 'border-white/30' : 'border-secondary/50' }}">
                            {{ $item->answer }}
                        </p>
                    </div>
                </div>

            </div>

            @endforeach

        </div>
    </div>

</section>

@push('styles')
<style>
    /* الحالة الابتدائية: مخفية، will-change يُدار في JS */
    .faq-item {
        opacity: 0;
        transition:
            opacity 0.55s cubic-bezier(0.16, 1, 0.3, 1),
            transform 0.55s cubic-bezier(0.16, 1, 0.3, 1),
            border-color 0.3s ease,
            box-shadow 0.3s ease,
            background-color 0.3s ease;
    }

    /* الاتجاه الابتدائي — 80px بدلاً من 120vw */
    .faq-from-right {
        transform: translate3d(80px, 0, 0);
    }

    .faq-from-left {
        transform: translate3d(-80px, 0, 0);
    }

    /* حالة الظهور */
    .faq-item.faq-visible {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }

    /* حالة الـ reset عند الصعود: instant بدون animation عكسية */
    .faq-item.faq-hidden {
        transition: none;
        opacity: 0;
    }

    .faq-item.faq-hidden.faq-from-right {
        transform: translate3d(80px, 0, 0);
    }

    .faq-item.faq-hidden.faq-from-left {
        transform: translate3d(-80px, 0, 0);
    }
</style>
@endpush

@push('scripts')
<script>
    (function() {
        var pendingTimers = [];

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                var items = entry.target.querySelectorAll('.faq-item');

                if (entry.isIntersecting) {
                    pendingTimers.forEach(clearTimeout);
                    pendingTimers = [];

                    items.forEach(function(item) {
                        var delay = parseInt(item.style.getPropertyValue('--faq-delay')) || 0;
                        var t = setTimeout(function() {
                            /* تفعيل will-change لحظة الـ animation فقط */
                            item.style.willChange = 'transform, opacity';
                            item.classList.remove('faq-hidden');
                            item.classList.add('faq-visible');
                            /* تحرير الـ layer بعد انتهاء الـ transition (0.55s) */
                            setTimeout(function() {
                                item.style.willChange = 'auto';
                            }, 600);
                        }, delay + 80);
                        pendingTimers.push(t);
                    });

                } else {
                    /*
                     * عند الخروج من الـ viewport:
                     * .faq-hidden يُعيد الـ direction transform فوراً (transition: none)
                     * جاهز لإعادة الـ animation عند العودة
                     */
                    pendingTimers.forEach(clearTimeout);
                    pendingTimers = [];

                    items.forEach(function(item) {
                        item.classList.remove('faq-visible');
                        item.classList.add('faq-hidden');
                    });
                }
            });
        }, {
            threshold: 0.08
        });

        document.addEventListener('DOMContentLoaded', function() {
            var container = document.getElementById('faq-accordion');
            if (container) observer.observe(container);
        });
    })();
</script>
@endpush