@php
    $currentLocale = app()->getLocale();
    $isAr = $currentLocale === 'ar';
    $targetLocale = $isAr ? 'en' : 'ar';

    $locales = [
        'ar' => ['label' => 'العربية', 'short' => 'ع',  'flag' => '🇸🇦', 'dir' => 'rtl'],
        'en' => ['label' => 'English',  'short' => 'EN', 'flag' => '🇬🇧', 'dir' => 'ltr'],
    ];

    $current = $locales[$currentLocale];
    $target  = $locales[$targetLocale];
@endphp

{{--
    Language Switcher — Progressive Enhancement
    - Uses a <form> POST for security (no GET-based crawlable state changes)
    - Pure CSS/JS, zero Alpine dependency
    - Works without JavaScript (graceful degradation to button click)
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
        class="lang-trigger group flex items-center gap-1.5 px-3 py-1.5 rounded-full border border-transparent hover:border-primary/20 hover:bg-primary/5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-primary/40 text-gray-600 hover:text-primary"
    >
        {{-- Globe Icon --}}
        <svg class="w-4 h-4 flex-shrink-0 transition-transform duration-500 group-[.is-open]:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
            <circle cx="12" cy="12" r="9"/>
            <path d="M3.6 9h16.8M3.6 15h16.8M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18"/>
        </svg>

        {{-- Current locale badge --}}
        <span class="text-xs font-black tracking-widest uppercase select-none">{{ $current['short'] }}</span>

        {{-- Chevron --}}
        <svg class="w-3 h-3 opacity-50 transition-transform duration-300 group-[.is-open]:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    {{-- Dropdown Panel --}}
    <div
        id="lang-panel"
        role="menu"
        aria-label="{{ __('land.lang_panel_label') }}"
        class="lang-panel absolute top-full mt-2 z-[200] min-w-[170px] rounded-2xl bg-white shadow-2xl border border-black/5 ring-1 ring-black/5 overflow-hidden
               opacity-0 scale-95 translate-y-1 pointer-events-none
               transition-all duration-200 ease-out
               {{ $isAr ? 'right-0' : 'left-0' }}"
    >
        {{-- Panel Header --}}
        <div class="px-4 pt-3 pb-2 border-b border-gray-50">
            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">{{ __('land.lang_select_language') }}</p>
        </div>

        <div class="py-1.5">
            @foreach ($locales as $code => $meta)
                @if ($code === $currentLocale)
                    {{-- Active / Current --}}
                    <div
                        role="menuitem"
                        aria-current="true"
                        class="flex items-center gap-3 px-4 py-2.5 cursor-default"
                    >
                        <span class="text-lg leading-none">{{ $meta['flag'] }}</span>
                        <div class="flex-1 min-w-0">
                            <span class="block text-sm font-bold text-primary truncate">{{ $meta['label'] }}</span>
                            <span class="block text-[10px] text-gray-400">{{ __('land.lang_current') }}</span>
                        </div>
                        {{-- Checkmark --}}
                        <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
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
                            class="lang-option w-full flex items-center gap-3 px-4 py-2.5 text-start hover:bg-gray-50 active:bg-gray-100 transition-colors duration-150 group/opt focus:outline-none focus:bg-gray-50"
                        >
                            <span class="text-lg leading-none">{{ $meta['flag'] }}</span>
                            <div class="flex-1 min-w-0">
                                <span class="block text-sm font-semibold text-gray-700 group-hover/opt:text-primary transition-colors truncate">{{ $meta['label'] }}</span>
                                <span class="block text-[10px] text-gray-400">{{ $meta['dir'] === 'rtl' ? 'RTL' : 'LTR' }}</span>
                            </div>
                            {{-- Animated arrow --}}
                            <svg class="w-4 h-4 text-gray-300 group-hover/opt:text-primary group-hover/opt:translate-x-0.5 rtl:group-hover/opt:-translate-x-0.5 rtl:rotate-180 transition-all duration-200 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
</div>

<style>
    /* Open state driven by JS data attribute — no Tailwind group magic needed */
    #lang-switcher[data-open="true"] #lang-panel {
        opacity: 1;
        transform: scale(1) translateY(0);
        pointer-events: auto;
    }
    #lang-switcher[data-open="true"] #lang-trigger {
        border-color: rgba(var(--color-primary-rgb, 0 102 153) / 0.2);
        background-color: rgba(var(--color-primary-rgb, 0 102 153) / 0.05);
        color: rgb(var(--color-primary-rgb, 0 102 153));
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
