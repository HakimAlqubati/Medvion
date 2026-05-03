<x-layouts.frontend :title="__('land.title')">
    <!-- <x-frontend.hero :slides="$slides" /> -->
    <x-frontend.about :alt-bg="false" />
    <x-frontend.features :alt-bg="true" :features="$features" />
    <x-frontend.latest-courses :alt-bg="false" />
    <x-frontend.faq :alt-bg="true" />
    <x-frontend.partners />
    <x-frontend.academic-experts />
    <x-frontend.testimonials :alt-bg="true" />
    <x-frontend.blog :alt-bg="false" />
</x-layouts.frontend>