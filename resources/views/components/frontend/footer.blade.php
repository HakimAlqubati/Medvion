<footer class="bg-primary-dark text-white pt-16 pb-8 mt-16 border-t-[6px] border-secondary relative overflow-hidden">
    {{-- Background Decoration --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-secondary/10 blur-[100px] rounded-full pointer-events-none -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-primary/20 blur-[80px] rounded-full pointer-events-none translate-y-1/2 -translate-x-1/2"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-8 mb-12">

            {{-- Column 1: Brand & Contact Info --}}
            <div class="md:col-span-5 lg:col-span-4 flex flex-col items-center md:items-start text-center md:text-start">
                <a href="{{ url('/') }}" class="inline-block text-3xl font-extrabold tracking-tight mb-4 focus:outline-none">
                    Medvion<span class="text-secondary">+</span>
                </a>
                <p class="text-gray-400 text-sm leading-relaxed mb-8 max-w-sm">{{ __('land.footer_tagline') }}</p>
                
                <div class="flex flex-col gap-4 w-full max-w-xs mx-auto md:mx-0">
                    {{-- Email --}}
                    <a href="mailto:hello@medvion.com" data-index="0" class="footer-link group flex items-center gap-4 bg-white/5 border border-white/10 p-3 rounded-2xl hover:bg-white/10 hover:border-white/20 hover:-translate-y-1 transition-all duration-300 w-full rtl:flex-row-reverse shadow-sm">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-white group-hover:bg-secondary group-hover:scale-110 group-hover:shadow-lg transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex flex-col text-start overflow-hidden">
                            <span class="text-xs text-white/50 uppercase tracking-widest font-semibold mb-0.5 whitespace-nowrap">{{ __('land.footer_email_desc') }}</span>
                            <span class="text-sm font-bold font-mono text-white/90 truncate">hello@medvion.com</span>
                        </div>
                    </a>
                    
                    {{-- WhatsApp --}}
                    <a href="https://wa.me/1234567890" target="_blank" data-index="1" class="footer-link group flex items-center gap-4 bg-white/5 border border-white/10 p-3 rounded-2xl hover:bg-white/10 hover:border-white/20 hover:-translate-y-1 transition-all duration-300 w-full rtl:flex-row-reverse shadow-sm">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-white group-hover:bg-[#25D366] group-hover:scale-110 group-hover:shadow-[0_0_15px_rgba(37,211,102,0.5)] transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <div class="flex flex-col text-start overflow-hidden">
                            <span class="text-xs text-white/50 uppercase tracking-widest font-semibold mb-0.5">{{ __('land.footer_whatsapp_desc') }}</span>
                            <span class="text-sm font-bold font-mono text-white/90" dir="ltr">+966 50 000 0000</span>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Column 2: Quick Links --}}
            <div class="md:col-span-3 lg:col-span-4 flex flex-col items-center flex-1 justify-center relative">
                <h3 class="text-white font-bold text-lg mb-6 decoration-secondary decoration-2 underline-offset-8 underline text-center">{{ __('land.footer_quick_links') }}</h3>
                <nav class="flex flex-col gap-4 text-sm font-medium text-gray-400 text-center w-max" id="footer-nav">
                    <a href="{{ url('/') }}"       data-index="2" class="footer-link hover:text-secondary hover:translate-x-1 rtl:hover:-translate-x-1 transition-all">{{ __('land.nav_home') }}</a>
                    <a href="{{ url('/#about') }}"  data-index="3" class="footer-link hover:text-secondary hover:translate-x-1 rtl:hover:-translate-x-1 transition-all">{{ __('land.nav_about') }}</a>
                    <a href="{{ url('/#courses') }}" data-index="4" class="footer-link hover:text-secondary hover:translate-x-1 rtl:hover:-translate-x-1 transition-all">{{ __('land.nav_courses') }}</a>
                    <a href="{{ route('privacy') }}" data-index="5" class="footer-link hover:text-secondary hover:translate-x-1 rtl:hover:-translate-x-1 transition-all">{{ __('land.nav_privacy') }}</a>
                    <a href="{{ route('terms') }}"   data-index="6" class="footer-link hover:text-secondary hover:translate-x-1 rtl:hover:-translate-x-1 transition-all">{{ __('land.nav_terms') }}</a>
                </nav>
            </div>

            {{-- Column 3: Social Media --}}
            <div class="md:col-span-4 lg:col-span-4 flex flex-col items-center md:items-end justify-center h-full pt-6 md:pt-0">
                <h3 class="text-white font-bold text-lg mb-6 decoration-secondary decoration-2 underline-offset-8 underline text-center md:text-end w-max">{{ __('land.footer_social_media') }}</h3>
                <div class="flex gap-4">
                    {{-- Facebook --}}
                    <a href="#" data-index="7" class="footer-link w-12 h-12 rounded-full border border-white/20 bg-white/5 flex items-center justify-center text-white/80 hover:text-white hover:bg-[#1877F2] hover:border-[#1877F2] hover:shadow-lg hover:-translate-y-1 transition-all duration-300" aria-label="Facebook">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                    </a>
                    {{-- Twitter / X --}}
                    <a href="#" data-index="8" class="footer-link w-12 h-12 rounded-full border border-white/20 bg-white/5 flex items-center justify-center text-white/80 hover:text-white hover:bg-black hover:border-black hover:shadow-lg hover:-translate-y-1 transition-all duration-300" aria-label="X (Twitter)">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    {{-- Instagram --}}
                    <a href="#" data-index="9" class="footer-link w-12 h-12 rounded-full border border-white/20 bg-white/5 flex items-center justify-center text-white/80 hover:text-white hover:bg-gradient-to-tr hover:from-yellow-500 hover:via-pink-500 hover:to-purple-500 hover:border-transparent hover:shadow-lg hover:-translate-y-1 transition-all duration-300" aria-label="Instagram">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    {{-- LinkedIn --}}
                    <a href="#" data-index="10" class="footer-link w-12 h-12 rounded-full border border-white/20 bg-white/5 flex items-center justify-center text-white/80 hover:text-white hover:bg-[#0077b5] hover:border-[#0077b5] hover:shadow-lg hover:-translate-y-1 transition-all duration-300" aria-label="LinkedIn">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                    </a>
                </div>
            </div>

        </div>

        <div class="relative border-t border-white/10 pt-8 pb-4 text-center text-sm text-gray-400">
            {!! __('land.footer_copy', ['year' => date('Y')]) !!}
        </div>
    </div>
</footer>
