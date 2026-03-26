<x-layouts.frontend>
    <x-slot:title>
        {{ __('land.privacy_title') }}
    </x-slot:title>

    <section class="bg-gray-50 py-12 md:py-20 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold text-primary tracking-tight">
                {{ __('land.privacy_title') }}
            </h1>
        </div>
    </section>

    <section class="py-12 md:py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-gray-700">
            <div class="bg-gray-50 p-6 md:p-10 rounded-2xl border border-gray-100 shadow-sm leading-relaxed">
                {!! __('land.privacy_content') !!}
            </div>
        </div>
    </section>
</x-layouts.frontend>
