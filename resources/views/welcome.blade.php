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


    <x-frontend.hero :slides="$slides" />


    <x-frontend.about :alt-bg="false" />
    {{-- <x-frontend.impacts :impacts="$impacts" /> --}}

    <x-frontend.features :alt-bg="true" :features="$features" />
    <x-frontend.latest-courses :alt-bg="false" />
    <x-frontend.faq :alt-bg="true" />
</x-layouts.frontend>