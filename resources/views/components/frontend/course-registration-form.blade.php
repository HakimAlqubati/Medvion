@props(['course'])

<div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mt-10 relative" id="registration-component">
    <div class="bg-gradient-to-r from-primary to-primary-light p-6 text-white text-center rounded-t-2xl">
        <h3 class="text-2xl font-bold mb-2">{{ __('land.reg_form_title') }}</h3>
        <p class="text-white/80 text-sm">{{ __('land.reg_form_subtitle') }}</p>
    </div>

    <div class="p-8 relative">
        <!-- Global Error Alert -->
        <div id="reg-error-alert" class="hidden mb-6 bg-red-50 text-red-700 border border-red-200 rounded-xl p-4 flex items-center gap-3 transition-opacity">
            <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            <div class="font-medium error-text"></div>
        </div>

        <!-- Success Message (Replaces Form when successful) -->
        <div id="reg-success-box" class="hidden text-center py-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 text-green-500 mb-6 mx-auto">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h4 class="text-2xl font-bold text-gray-800 mb-2">{{ __('land.contact_success_heading') }}</h4>
            <p class="text-gray-500 success-text">{{ __('land.reg_success_msg') }}</p>
        </div>

        <form id="course-registration-form" action="{{ route('courses.register') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.reg_full_name') }} <span class="text-red-500">*</span></label>
                    <input type="text" id="full_name" name="full_name" required 
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 transition-colors bg-gray-50/50 focus:bg-white text-gray-800">
                    <span class="text-red-500 text-xs mt-1 hidden error-full_name"></span>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.reg_email') }} <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" required 
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 transition-colors bg-gray-50/50 focus:bg-white text-gray-800" dir="ltr">
                    <span class="text-red-500 text-xs mt-1 hidden error-email"></span>
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.reg_phone') }} <span class="text-red-500">*</span></label>
                    <input type="text" id="phone" name="phone" required 
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 transition-colors bg-gray-50/50 focus:bg-white text-gray-800" dir="ltr">
                    <span class="text-red-500 text-xs mt-1 hidden error-phone"></span>
                </div>

                <!-- Profession -->
                <div>
                    <label for="profession" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.reg_profession') }}</label>
                    <input type="text" id="profession" name="profession" placeholder="{{ __('land.reg_profession_ph') }}" 
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 transition-colors bg-gray-50/50 focus:bg-white text-gray-800 placeholder:text-gray-400 text-sm">
                    <span class="text-red-500 text-xs mt-1 hidden error-profession"></span>
                </div>
            </div>

            <!-- Workplace -->
            <div>
                <label for="workplace" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.reg_workplace') }}</label>
                <input type="text" id="workplace" name="workplace" 
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 transition-colors bg-gray-50/50 focus:bg-white text-gray-800">
                <span class="text-red-500 text-xs mt-1 hidden error-workplace"></span>
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">{{ __('land.reg_notes') }}</label>
                <textarea id="notes" name="notes" rows="4" 
                          class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 transition-colors bg-gray-50/50 focus:bg-white text-gray-800"></textarea>
                <span class="text-red-500 text-xs mt-1 hidden error-notes"></span>
            </div>

            <div class="pt-4 border-t border-gray-100">
                <button type="submit" id="reg-submit-btn"
                        class="w-full flex items-center justify-center gap-2 bg-primary hover:bg-primary-light text-white font-bold py-3.5 px-8 rounded-xl shadow-lg shadow-primary/30 transition-all duration-300 hover:-translate-y-0.5 disabled:opacity-70 disabled:cursor-not-allowed group">
                    <span class="btn-text">{{ __('land.reg_btn_submit') }}</span>
                    <!-- Original Icon -->
                    <svg class="w-5 h-5 rtl:rotate-180 btn-icon transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    <!-- Loading Spinner -->
                    <svg class="w-5 h-5 animate-spin hidden spinner-icon" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('course-registration-form');
            const submitBtn = document.getElementById('reg-submit-btn');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnIcon = submitBtn.querySelector('.btn-icon');
            const spinnerIcon = submitBtn.querySelector('.spinner-icon');
            const successBox = document.getElementById('reg-success-box');
            const errorAlert = document.getElementById('reg-error-alert');
            const errorAlertText = errorAlert.querySelector('.error-text');

            if(!form) return;

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Reset Errors
                errorAlert.classList.add('hidden');
                document.querySelectorAll('#course-registration-form span[class*="error-"]').forEach(el => {
                    el.classList.add('hidden');
                    el.innerText = '';
                });

                // Set Loading State
                submitBtn.disabled = true;
                btnText.innerText = '{{ __('land.contact_processing') }}';
                btnIcon.classList.add('hidden');
                spinnerIcon.classList.remove('hidden');

                const formData = new FormData(form);

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        // Validation errors (422)
                        if (response.status === 422) {
                            const errors = data.errors;
                            for (const field in errors) {
                                const errorSpan = document.querySelector(`.error-${field}`);
                                if (errorSpan) {
                                    errorSpan.innerText = errors[field][0];
                                    errorSpan.classList.remove('hidden');
                                }
                            }
                        } else {
                            // General Error
                            errorAlertText.innerText = data.message || '{{ __('land.reg_error_msg') }}';
                            errorAlert.classList.remove('hidden');
                        }
                    } else {
                        // Success Logic (Hide form, show success dialog)
                        form.classList.add('hidden');
                        successBox.classList.remove('hidden');
                        successBox.classList.add('animate-fade-in-up');
                    }
                } catch (error) {
                    errorAlertText.innerText = 'حدث خطأ في الشبكة، الرجاء المحاولة مرة أخرى.';
                    errorAlert.classList.remove('hidden');
                } finally {
                    // Reset Loading State
                    submitBtn.disabled = false;
                    btnText.innerText = '{{ __('land.reg_btn_submit') }}';
                    btnIcon.classList.remove('hidden');
                    spinnerIcon.classList.add('hidden');
                }
            });
        });
    </script>
</div>
