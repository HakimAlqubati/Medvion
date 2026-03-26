<x-layouts.frontend>
    <x-slot:title>
        {{ __('land.contact_page_title') }}
    </x-slot:title>

    {{-- Hero Section --}}
    <section class="bg-gray-50 py-16 md:py-24 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold text-primary tracking-tight mb-4">
                {{ __('land.contact_hero_title') }}
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg md:text-xl">
                {{ __('land.contact_hero_subtitle') }}
            </p>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="py-16 md:py-24 bg-white relative">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Contact Form --}}
            <div class="bg-gray-50 rounded-2xl p-8 md:p-10 border border-gray-100 shadow-sm relative overflow-hidden">
                {{-- Decorative border top --}}
                <div class="absolute top-0 left-0 w-full h-1 bg-primary"></div>
                
                <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">{{ __('land.contact_form_title') }}</h2>
                
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.contact_name') }}</label>
                            <input type="text" id="name" name="name" required class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary focus:ring-opacity-50 transition-colors bg-white px-4 py-3">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.contact_email') }}</label>
                            <input type="email" id="email" name="email" required class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary focus:ring-opacity-50 transition-colors bg-white px-4 py-3">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.contact_phone') }}</label>
                            <input type="tel" id="phone" name="phone" dir="ltr" class="block w-full text-left rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary focus:ring-opacity-50 transition-colors bg-white px-4 py-3">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.contact_subject') }}</label>
                            <input type="text" id="subject" name="subject" required class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary focus:ring-opacity-50 transition-colors bg-white px-4 py-3">
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.contact_message') }}</label>
                        <textarea id="message" name="message" rows="5" required class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary focus:ring-opacity-50 transition-colors bg-white px-4 py-3 resize-none"></textarea>
                    </div>

                    <div class="pt-4 text-center">
                        <button type="button" class="inline-flex justify-center items-center px-10 py-3 border border-transparent text-base font-bold rounded-lg text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-300 shadow-md active:scale-95 w-full md:w-auto">
                            {{ __('land.contact_submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-layouts.frontend>
