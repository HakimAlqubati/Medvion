<x-layouts.frontend>
    <x-slot:title>
        {{ __('land.contact_page_title') }}
    </x-slot:title>

    {{-- =========================================================
         FUTURISTIC CONTACT PAGE - YEAR 2'000'000 AD THEME
         ========================================================= --}}
    <div class="relative min-h-screen bg-primary text-white overflow-hidden flex flex-col justify-center pt-28 pb-20">
        
        {{-- AMBIENT BACKGROUND & ORBITAL ELEMENTS --}}
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden" aria-hidden="true">
            {{-- Deep radial glow --}}
            <div class="absolute inset-0"
                 style="background: radial-gradient(circle at 70% 50%, rgba(255,255,255,0.1) 0%, rgba(13,148,136,0.1) 50%, transparent 80%); animation: pulse-glow 8s ease-in-out infinite alternate;"></div>
            
            {{-- Giant Ambient Orbs --}}
            <div class="absolute -top-[20%] -right-[10%] w-[800px] h-[800px] rounded-full blur-[120px] bg-white/10"
                 style="animation: float-slow 20s ease-in-out infinite alternate;"></div>
            <div class="absolute -bottom-[20%] -left-[10%] w-[600px] h-[600px] rounded-full blur-[100px] bg-secondary/20"
                 style="animation: float-slow 25s ease-in-out infinite alternate-reverse;"></div>

            {{-- Grid Matrix lines --}}
            <div class="absolute inset-0 opacity-[0.03]"
                 style="background-image: linear-gradient(rgba(255,255,255,1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,1) 1px, transparent 1px); background-size: 60px 60px;"></div>
        </div>

        {{-- MAIN CONTENT GRID --}}
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-8 items-center">

                {{-- LEFT COLUMN: GIANT TYPOGRAPHY & FLOATING CARDS --}}
                <div class="lg:col-span-7 flex flex-col justify-center text-center lg:text-start">
                    
                    {{-- Cyber Badge --}}
                    <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full border border-white/20 bg-white/10 backdrop-blur-md mb-8 mx-auto lg:mx-0 w-max shadow-[0_0_20px_rgba(255,255,255,0.1)]">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-secondary"></span>
                        </span>
                        <span class="text-xs font-bold uppercase tracking-[0.3em] text-white">
                            {{ __('land.contact_hero_title') }}
                        </span>
                    </div>

                    {{-- Giant Headline --}}
                    <h1 class="font-black leading-[1.1] tracking-tighter mb-8 drop-shadow-xl text-5xl md:text-7xl lg:text-[5.5rem] xl:text-[6.5rem]">
                        <span class="block text-white glow-text">{{ __('land.contact_hero_main') }}</span>
                        <span class="block text-white glow-text mt-2">
                            {{ __('land.contact_hero_highlight') }}
                        </span>
                    </h1>

                    <p class="text-lg md:text-2xl text-white drop-shadow-md max-w-2xl mx-auto lg:mx-0 font-medium leading-relaxed mb-12">
                        {{ __('land.contact_hero_desc') }}
                    </p>

                    {{-- Floating Glass Cards --}}
                    <div class="flex flex-col sm:flex-row gap-6 justify-center lg:justify-startperspective-1000">
                        
                        {{-- WhatsApp / Support Card --}}
                        <a href="https://wa.me/1234567890" target="_blank" rel="noopener noreferrer" class="floating-card group relative flex items-center gap-5 p-6 rounded-3xl border border-white/10 bg-white/[0.08] backdrop-blur-xl transition-all duration-500 hover:bg-white/[0.15] hover:border-white/30 hover:-translate-y-2 hover:shadow-[0_20px_40px_-10px_rgba(0,0,0,0.2)]">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-green-400 to-emerald-600 flex items-center justify-center shadow-lg shadow-green-500/30 group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <div class="text-start">
                                <p class="text-xs uppercase tracking-widest text-white/90 mb-1 font-semibold">{{ __('land.contact_whatsapp') }}</p>
                                <p class="font-bold text-white text-lg drop-shadow-sm">{{ __('land.contact_whatsapp_desc') }}</p>
                            </div>
                            <div class="absolute inset-0 rounded-3xl border border-white/0 group-hover:border-white/10 transition-colors duration-500 pointer-events-none"></div>
                        </a>

                        {{-- Email Card --}}
                        <a href="mailto:support@medvion.com" class="floating-card delay-100 group relative flex items-center gap-5 p-6 rounded-3xl border border-white/10 bg-white/[0.08] backdrop-blur-xl transition-all duration-500 hover:bg-white/[0.15] hover:border-secondary/40 hover:-translate-y-2 hover:shadow-[0_20px_40px_-10px_rgba(13,148,136,0.2)]">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-secondary to-teal-700 flex items-center justify-center shadow-lg shadow-secondary/30 group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="text-start">
                                <p class="text-xs uppercase tracking-widest text-white/90 mb-1 font-semibold">{{ __('land.contact_support_email') }}</p>
                                <p class="font-bold text-white text-lg font-mono drop-shadow-sm">hello<span class="text-secondary-light">@</span>medvion.com</p>
                            </div>
                        </a>

                    </div>
                </div>

                {{-- RIGHT COLUMN: NEON GLASS FORM --}}
                <div class="lg:col-span-5 relative mt-10 lg:mt-0">
                    
                    {{-- Form Backdrop Glow --}}
                    <div class="absolute inset-0 bg-primary/20 blur-[80px] rounded-full pointer-events-none animate-pulse"></div>

                    {{-- The Form Container --}}
                    <div id="form-container" class="relative bg-white/[0.08] backdrop-blur-2xl border border-white/20 rounded-[2.5rem] p-8 sm:p-10 shadow-[0_0_40px_rgba(0,0,0,0.2)] overflow-hidden">
                        
                        {{-- Corner Accents --}}
                        <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-primary to-transparent opacity-20 border-t border-r border-primary/50 rounded-bl-full pointer-events-none"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tl from-secondary to-transparent opacity-20 border-b border-l border-secondary/50 rounded-tr-full pointer-events-none"></div>

                        <h3 class="text-2xl sm:text-3xl font-bold text-white mb-8 text-center tracking-tight">{{ __('land.contact_form_title') }}</h3>

                        <form id="contact-form" action="{{ route('contact.store') }}" method="POST" class="space-y-6 relative z-10">
                            @csrf
                            
                            {{-- Field Inputs with floating labels --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="input-group">
                                    <input type="text" id="name" name="name" required placeholder=" " 
                                           class="cyber-input peer block w-full bg-white/[0.08] border border-white/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-white focus:bg-white/[0.12] transition-all placeholder-transparent shadow-inner">
                                    <label for="name" class="cyber-label absolute left-5 rtl:right-5 rtl:left-auto text-white/70 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-white peer-focus:bg-primary peer-focus:px-2 rounded">
                                        {{ __('land.contact_name') }}
                                    </label>
                                </div>
                                <div class="input-group">
                                    <input type="email" id="email" name="email" required placeholder=" " 
                                           class="cyber-input peer block w-full bg-white/[0.08] border border-white/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-secondary focus:bg-white/[0.12] transition-all placeholder-transparent shadow-inner">
                                    <label for="email" class="cyber-label absolute left-5 rtl:right-5 rtl:left-auto text-white/70 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-secondary peer-focus:bg-primary peer-focus:px-2 rounded">
                                        {{ __('land.contact_email') }}
                                    </label>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="input-group">
                                    <input type="text" id="phone" name="phone" dir="ltr" required placeholder=" " 
                                           class="cyber-input peer block w-full text-left bg-white/[0.08] border border-white/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-white focus:bg-white/[0.12] transition-all placeholder-transparent shadow-inner">
                                    <label for="phone" class="cyber-label absolute left-5 rtl:right-5 rtl:left-auto text-white/70 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-white peer-focus:bg-primary peer-focus:px-2 rounded">
                                        {{ __('land.contact_phone') }}
                                    </label>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="subject" name="subject" required placeholder=" " 
                                           class="cyber-input peer block w-full bg-white/[0.08] border border-white/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-secondary focus:bg-white/[0.12] transition-all placeholder-transparent shadow-inner">
                                    <label for="subject" class="cyber-label absolute left-5 rtl:right-5 rtl:left-auto text-white/70 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-secondary peer-focus:bg-primary peer-focus:px-2 rounded">
                                        {{ __('land.contact_subject') }}
                                    </label>
                                </div>
                            </div>

                            <div class="input-group">
                                <textarea id="message" name="message" rows="4" required placeholder=" " 
                                          class="cyber-input peer block w-full resize-none bg-white/[0.08] border border-white/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-white focus:bg-white/[0.12] transition-all placeholder-transparent shadow-inner"></textarea>
                                <label for="message" class="cyber-label absolute left-5 rtl:right-5 rtl:left-auto text-white/70 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-4 peer-focus:-top-2.5 peer-focus:text-xs peer-focus:text-white peer-focus:bg-primary peer-focus:px-2 rounded">
                                    {{ __('land.contact_message') }}
                                </label>
                            </div>

                            <button id="submit-btn" type="submit" 
                                    class="group relative w-full flex items-center justify-center gap-3 bg-white text-primary hover:bg-gray-100 font-extrabold text-lg py-5 px-8 rounded-xl overflow-hidden transition-all duration-300 transform active:scale-[0.98] shadow-[0_0_20px_rgba(255,255,255,0.2)] hover:shadow-[0_0_30px_rgba(255,255,255,0.4)]">
                                <span class="absolute inset-0 w-full h-full bg-white/40 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-500 ease-out"></span>
                                <span class="relative flex items-center gap-2">
                                    <span id="submit-text">{{ __('land.contact_submit') }}</span>
                                    <svg class="w-5 h-5 rtl:rotate-180 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </span>
                            </button>
                        </form>

                        {{-- SUCCESS OVERLAY (Hidden initially) --}}
                        <div id="success-message" style="display: none;" class="absolute inset-0 z-20 flex flex-col items-center justify-center bg-primary/95 backdrop-blur-3xl animate-fade-in text-center px-8">
                            
                            {{-- Orbital Success Checkmark --}}
                            <div class="relative w-32 h-32 mb-8 flex justify-center items-center">
                                <div class="absolute inset-0 border-2 border-dashed border-secondary rounded-full" style="animation: spin-slow 10s linear infinite;"></div>
                                <div class="absolute inset-2 border border-primary-light/50 rounded-full" style="animation: spin-slow 7s linear infinite reverse;"></div>
                                <div class="relative w-16 h-16 bg-gradient-to-br from-secondary to-teal-600 rounded-full flex items-center justify-center shadow-[0_0_30px_rgba(13,148,136,0.6)] animate-pulse-fast">
                                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                            
                            <h3 class="text-3xl font-black text-white mb-3 tracking-tight">{{ __('land.contact_success_heading') }}</h3>
                            <h4 class="text-xl font-bold text-secondary mb-3">{{ __('land.contact_success_subheading') }}</h4>
                            <p class="text-white/60 text-lg leading-relaxed max-w-sm">
                                {{ __('land.contact_success_body') }}
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- =========================================================
         SCOPED CSS & JS FOR THE FUTURISTIC VIBE
         ========================================================= --}}
    @push('styles')
    <style>
        .input-group {
            position: relative;
        }
        .cyber-label {
            top: -0.65rem;
            pointer-events: none;
        }
        .cyber-input {
            /* Fix autocomplete background colors overlapping transparency */
            background-color: rgba(255,255,255,0.04) !important;
            color-scheme: dark;
        }
        .cyber-input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px #1A2B4C inset !important;
            -webkit-text-fill-color: white !important;
            transition: background-color 5000s ease-in-out 0s;
        }
        
        .glow-text {
            text-shadow: 0 0 40px rgba(255,255,255,0.1);
        }
        
        .floating-card {
            transform: perspective(1000px) translateZ(0);
        }
        
        @keyframes float-slow {
            0% { transform: translateY(0) scale(1); }
            100% { transform: translateY(-30px) scale(1.05); }
        }
        
        @keyframes pulse-glow {
            0% { opacity: 0.7; transform: scale(0.95); }
            100% { opacity: 1; transform: scale(1.05); }
        }

        @keyframes spin-slow {
            100% { transform: rotate(360deg); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .animate-pulse-fast {
            animation: pulse-fast 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse-fast {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: .8; transform: scale(0.95); }
        }
    </style>
    @endpush

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('contact-form');
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const successMsg = document.getElementById('success-message');

            if(form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    
                    // Reset errors
                    document.querySelectorAll('.cyber-error').forEach(el => el.remove());
                    
                    const originalBtnText = submitText.innerHTML;
                    submitBtn.disabled = true;
                    submitText.innerHTML = "{!! __('land.contact_processing') !!}";
                    
                    fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json().then(data => ({status: res.status, body: data})))
                    .then(response => {
                        if(response.status === 422) {
                            // High-tech red validation
                            const errors = response.body.errors;
                            for (const field in errors) {
                                const input = document.getElementById(field);
                                if(input) {
                                    const errorEl = document.createElement('p');
                                    errorEl.className = 'cyber-error text-xs font-bold text-red-400 mt-2 absolute -bottom-5 w-full';
                                    errorEl.innerText = errors[field][0];
                                    input.parentNode.appendChild(errorEl);
                                    
                                    // Change glow to red
                                    input.classList.remove('border-white/10', 'focus:border-primary', 'focus:border-secondary');
                                    input.classList.add('border-red-500/50', 'focus:border-red-500', 'shadow-[0_0_15px_rgba(239,68,68,0.3)]');
                                }
                            }
                        } else if(response.status === 201 || response.status === 200) {
                            successMsg.style.display = 'flex';
                        } else {
                            alert('SYSTEM ERROR: Connection interrupted.');
                        }
                    })
                    .catch(error => {
                        console.error('SYSTEM FAILURE:', error);
                        alert('SYSTEM FAILURE: Network connection lost.');
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        if(successMsg.style.display === 'none') {
                            submitText.innerHTML = originalBtnText;
                        }
                    });
                });

                // Clear cyber red styling on input
                form.querySelectorAll('input, textarea').forEach(input => {
                    input.addEventListener('input', function() {
                        this.classList.remove('border-red-500/50', 'focus:border-red-500', 'shadow-[0_0_15px_rgba(239,68,68,0.3)]');
                        this.classList.add('border-white/10');
                        // fallback border focus based on element ID or generic class
                        if(this.id === 'email' || this.id === 'subject') {
                            this.classList.add('focus:border-secondary');
                        } else {
                            this.classList.add('focus:border-primary');
                        }
                        
                        const error = this.parentNode.querySelector('.cyber-error');
                        if(error) error.remove();
                    });
                });
            }
        });
    </script>
</x-layouts.frontend>
