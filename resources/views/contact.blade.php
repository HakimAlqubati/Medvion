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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-8">
                
                {{-- Contact Information --}}
                <div class="lg:col-span-1 space-y-8 mt-2">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-8">{{ __('land.contact_info_title') }}</h2>
                        
                        {{-- WhatsApp --}}
                        <div class="flex items-start gap-4 mb-8 group">
                            <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-xl bg-primary/10 text-primary transition-colors group-hover:bg-primary group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ __('land.contact_whatsapp') }}</h3>
                                <p class="text-gray-600 mt-1 font-medium" dir="ltr">+966 50 000 0000</p>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-start gap-4 group">
                            <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-xl bg-primary/10 text-primary transition-colors group-hover:bg-primary group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ __('land.contact_support_email') }}</h3>
                                <p class="text-gray-600 mt-1 font-medium">support@medvion.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="lg:col-span-2">
                    <div class="bg-gray-50 rounded-2xl p-8 md:p-10 border border-gray-100 shadow-sm relative overflow-hidden">
                        {{-- Decorative border top --}}
                        <div class="absolute top-0 left-0 w-full h-1 bg-primary"></div>
                        
                        <h2 class="text-2xl font-bold text-gray-800 mb-8">{{ __('land.contact_form_title') }}</h2>
                        
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

                            <div class="pt-4">
                                <button type="button" class="inline-flex justify-center items-center px-8 py-3 border border-transparent text-base font-bold rounded-lg text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-300 w-full md:w-auto shadow-md active:scale-95">
                                    {{ __('land.contact_submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layouts.frontend>
