@php
    $currentLocale = app()->getLocale();
    $isAr = $currentLocale === 'ar';
    $targetLocale = $isAr ? 'en' : 'ar';

    $locales = [
        'ar' => ['label' => 'العربية', 'short' => 'ع',  'flag' => '<img src="'.asset('assets/flags/sa.svg').'" alt="SA" class="w-6 h-auto rounded-[2px] shadow-sm border border-black/5">', 'dir' => 'rtl'],
        'en' => ['label' => 'English',  'short' => 'EN', 'flag' => '<img src="'.asset('assets/flags/gb.svg').'" alt="GB" class="w-6 h-auto rounded-[2px] shadow-sm border border-black/5">', 'dir' => 'ltr'],
    ];

    $current = $locales[$currentLocale];
    $target  = $locales[$targetLocale];
@endphp

{{--
    Language Switcher — Premium Enhancement
    - Uses a <form> POST for security
    - High-end UI with glassmorphism, micro-interactions, and refined typography
    - Zero Alpine dependency
--}}
<div class="lang-switcher-wrap relative" id="lang-switcher">
    {{-- Trigger Button --}}
    <button
        type="button"
        id="lang-trigger"
        aria-haspopup="true"
        aria-expanded="false"
        aria-controls="lang-panel"
        aria-label="{{ __('land.lang_switch_label') }}"
        class="lang-trigger group relative flex items-center justify-between gap-3 px-2.5 py-1.5 rounded-2xl bg-white border border-gray-200/80 shadow-sm hover:shadow-md hover:border-primary/40 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-primary/20 text-gray-700 min-w-[120px]"
    >
        <div class="flex items-center gap-2">
            <span class="flex items-center justify-center leading-none">{!! $current['flag'] !!}</span>
            <span class="text-sm font-bold tracking-wide mt-[2px] text-gray-800 group-hover:text-primary transition-colors">{{ $current['label'] }}</span>
        </div>
        
        {{-- Chevron --}}
        <div class="flex items-center justify-center bg-gray-50 group-hover:bg-primary/10 rounded-full p-1.5 transition-colors">
            <svg class="w-3.5 h-3.5 text-gray-400 group-hover:text-primary transition-transform duration-300 chevron-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
    </button>

    {{-- Dropdown Panel --}}
    <div
        id="lang-panel"
        role="menu"
        aria-label="{{ __('land.lang_panel_label') }}"
        class="lang-panel absolute top-full mt-3 z-[200] min-w-[220px] rounded-2xl bg-white/95 backdrop-blur-xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.15)] border border-gray-100 ring-1 ring-black/5 overflow-hidden
               opacity-0 scale-95 translate-y-2 pointer-events-none
               origin-top
               transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]
               {{ $isAr ? 'left-0 sm:right-0 sm:left-auto' : 'right-0 sm:left-0 sm:right-auto' }}"
    >
        <div class="p-2 space-y-1">
            @foreach ($locales as $code => $meta)
                @if ($code === $currentLocale)
                    {{-- Active / Current --}}
                    <div
                        role="menuitem"
                        aria-current="true"
                        class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-primary/5 border border-primary/10 cursor-default relative"
                    >
                        <div class="flex items-center gap-3">
                            <span class="flex items-center justify-center leading-none">{!! $meta['flag'] !!}</span>
                            <div class="flex flex-col">
                                <span class="block text-sm font-bold text-primary">{{ $meta['label'] }}</span>
                                <span class="block text-[10px] font-bold text-primary/60 uppercase tracking-wider mt-0.5">{{ __('land.lang_current') }}</span>
                            </div>
                        </div>
                        {{-- Checkmark --}}
                        <div class="flex items-center justify-center w-6 h-6 rounded-full bg-white shadow-sm border border-primary/10 text-primary">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                @else
                    {{-- Switch Form --}}
                    <form
                        method="POST"
                        action="{{ route('locale.switch', $code) }}"
                        role="none"
                    >
                        @csrf
                        <button
                            type="submit"
                            role="menuitem"
                            class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-start hover:bg-gray-50 active:bg-gray-100 transition-all duration-200 group/opt focus:outline-none focus:bg-gray-50 border border-transparent"
                        >
                            <div class="flex items-center gap-3">
                                <span class="flex items-center justify-center leading-none opacity-80 group-hover/opt:opacity-100 group-hover/opt:scale-110 transition-all duration-300 grayscale-[30%] group-hover/opt:grayscale-0">{!! $meta['flag'] !!}</span>
                                <div class="flex flex-col">
                                    <span class="block text-sm font-bold text-gray-600 group-hover/opt:text-gray-900 transition-colors">{{ $meta['label'] }}</span>
                                    <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mt-0.5 group-hover/opt:text-gray-500 transition-colors">{{ $meta['dir'] === 'rtl' ? 'Right-to-Left' : 'Left-to-Right' }}</span>
                                </div>
                            </div>
                            
                            {{-- Arrow icon on hover --}}
                            <div class="flex items-center justify-center w-6 h-6 rounded-full bg-transparent group-hover/opt:bg-white group-hover/opt:shadow-sm group-hover/opt:border group-hover/opt:border-gray-200 text-gray-300 group-hover/opt:text-gray-600 transition-all duration-300 opacity-0 group-hover/opt:opacity-100 -translate-x-2 group-hover/opt:translate-x-0 rtl:translate-x-2 rtl:group-hover/opt:translate-x-0">
                                <svg class="w-3.5 h-3.5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </button>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
</div>

<style>
    /* Open state driven by JS data attribute */
    #lang-switcher[data-open="true"] #lang-panel {
        opacity: 1;
        transform: scale(1) translateY(0);
        pointer-events: auto;
    }
    #lang-switcher[data-open="true"] #lang-trigger {
        border-color: rgba(var(--color-primary-rgb, 14, 165, 233) / 0.4);
        background-color: rgba(var(--color-primary-rgb, 14, 165, 233) / 0.04);
        box-shadow: 0 4px 12px -2px rgba(var(--color-primary-rgb, 14, 165, 233) / 0.12);
    }
    #lang-switcher[data-open="true"] #lang-trigger span {
        color: rgb(var(--color-primary-rgb, 14, 165, 233));
    }
    #lang-switcher[data-open="true"] .chevron-icon {
        transform: rotate(180deg);
        color: rgb(var(--color-primary-rgb, 14, 165, 233));
    }
</style>

<script>
(function () {
    const switcher = document.getElementById('lang-switcher');
    const trigger  = document.getElementById('lang-trigger');
    const panel    = document.getElementById('lang-panel');
    if (!switcher || !trigger || !panel) return;

    const open  = () => { switcher.setAttribute('data-open', 'true');  trigger.setAttribute('aria-expanded', 'true');  };
    const close = () => { switcher.setAttribute('data-open', 'false'); trigger.setAttribute('aria-expanded', 'false'); };
    const isOpen = () => switcher.getAttribute('data-open') === 'true';

    trigger.addEventListener('click', (e) => {
        e.stopPropagation();
        isOpen() ? close() : open();
    });

    // Close on outside click
    document.addEventListener('click', (e) => {
        if (!switcher.contains(e.target)) close();
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isOpen()) { close(); trigger.focus(); }
    });

    // Keyboard nav within panel
    panel.addEventListener('keydown', (e) => {
        const items = [...panel.querySelectorAll('[role="menuitem"]')];
        const idx   = items.indexOf(document.activeElement);
        if (e.key === 'ArrowDown') { e.preventDefault(); items[(idx + 1) % items.length]?.focus(); }
        if (e.key === 'ArrowUp')   { e.preventDefault(); items[(idx - 1 + items.length) % items.length]?.focus(); }
    });
})();
</script>
