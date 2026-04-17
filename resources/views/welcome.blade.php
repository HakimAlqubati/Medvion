<x-layouts.frontend :title="__('land.title')">

    {{--
    ┌─────────────────────────────────────────────────────────┐
    │              HERO VERSION SWITCHER                       │
    │  $activeHero = 1  →  Hero Section الأصلي (Slider)       │
    │  $activeHero = 2  →  Hero Section 2 (Orbital Ecosystem) │
    │                                                         │
    │  للتبديل: غيّر الرقم أدناه فقط                          │
    └─────────────────────────────────────────────────────────┘
    --}}
    @php $activeHero = 1; @endphp

    @if ($activeHero === 1)
    <x-frontend.hero :slides="$slides" />
    @else
    <x-frontend.hero2 />
    @endif

    <!-- <x-frontend.about :alt-bg="false" /> -->
    {{-- <x-frontend.impacts :impacts="$impacts" /> --}}

    <x-frontend.features :alt-bg="true" />
    <!-- <x-frontend.latest-courses :alt-bg="false" /> -->
    <x-frontend.faq :alt-bg="true" />
</x-layouts.frontend>