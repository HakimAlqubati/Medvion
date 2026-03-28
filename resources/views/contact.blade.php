<x-layouts.frontend>
    <x-slot:title>
        {{ __('land.contact_page_title') }}
    </x-slot:title>

    {{-- Hero Section --}}
    <section class="bg-primary pt-40 pb-16 md:pt-48 md:pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                {{ __('land.contact_hero_title') }}
            </h1>
            <p class="text-white/80 max-w-2xl mx-auto text-lg md:text-xl">
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
                
                <form id="contact-form" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
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
                        <button id="submit-btn" type="submit" class="inline-flex justify-center items-center px-10 py-3 border border-transparent text-base font-bold rounded-lg text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-300 shadow-md active:scale-95 w-full md:w-auto">
                            {{ __('land.contact_submit') }}
                        </button>
                    </div>
                </form>

                {{-- Success Message Container (Hidden by default) --}}
                <div id="success-message" class="hidden text-center py-10 animate-fade-in-up">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">تم الإرسال بنجاح!</h3>
                    <p class="text-gray-600 text-lg">لقد استلمنا رسالتك وسيقوم فريق Medvion بالتواصل معك في أقرب وقت ممكن.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('contact-form');
            const submitBtn = document.getElementById('submit-btn');
            const successMsg = document.getElementById('success-message');

            if(form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    
                    // Reset previous errors
                    document.querySelectorAll('.error-text').forEach(el => el.remove());
                    
                    const originalBtnText = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg> جاري الإرسال...';
                    
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
                            // Display validation errors dynamically
                            const errors = response.body.errors;
                            for (const field in errors) {
                                const input = document.getElementById(field);
                                if(input) {
                                    const errorEl = document.createElement('p');
                                    errorEl.className = 'error-text text-sm font-semibold text-red-500 mt-2';
                                    errorEl.innerText = errors[field][0];
                                    input.parentNode.appendChild(errorEl);
                                    input.classList.add('border-red-300', 'focus:border-red-500', 'focus:ring-red-500');
                                }
                            }
                        } else if(response.status === 201 || response.status === 200) {
                            // Hide form, show success graphic
                            form.style.display = 'none';
                            successMsg.classList.remove('hidden');
                        } else {
                            alert('عذراً، حدث خطأ غير متوقع. يرجى المحاولة لاحقاً.');
                        }
                    })
                    .catch(error => {
                        console.error('Submission Error:', error);
                        alert('فشل الاتصال بالخادم، قد تكون المشكلة من اتصال الإنترنت.');
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    });
                });

                // Clear inline errors exactly when user types
                form.querySelectorAll('input, textarea').forEach(input => {
                    input.addEventListener('input', function() {
                        this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-500');
                        const error = this.parentNode.querySelector('.error-text');
                        if(error) error.remove();
                    });
                });
            }
        });
    </script>


</x-layouts.frontend>
