@props(['course'])

@php
    /** @var \App\Models\User $user */
    $user = auth()->user();

    // Check if the user is already registered for this course
    $isRegistered = false;
    if ($user) {
        $isRegistered = \App\Models\CourseRegistration::where('course_id', $course->id)
            ->where('email', $user->email)
            ->exists();
    }
@endphp

<div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mt-10 relative" id="registration-component">

    @if($isRegistered)
        {{-- ALREADY REGISTERED MESSAGE ─────────────────────────────────── --}}
        <div class="p-10 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-primary/10 text-primary mb-6 mx-auto">
                {{-- User Check Icon --}}
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h4 class="text-2xl font-bold text-gray-900 mb-3">{{ __('land.already_enrolled_title') }}</h4>
            <p class="text-gray-500 max-w-sm mx-auto leading-relaxed">{{ __('land.already_enrolled_msg') }}</p>
        </div>
    @else
        {{-- REGISTRATION FORM ──────────────────────────────────────────── --}}
        
        {{-- Form Header --}}
        <div class="bg-gradient-to-r from-primary to-primary-light p-6 text-white rounded-t-2xl">
            <h3 class="text-2xl font-bold mb-1">{{ __('land.reg_form_title') }}</h3>
            <p class="text-white/75 text-sm">{{ __('land.reg_form_subtitle') }}</p>
        </div>

        <div class="p-8 relative">

            {{-- Error Alert --}}
            <div id="reg-error-alert" class="hidden mb-6 bg-red-50 text-red-700 border border-red-200 rounded-xl p-4 flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <div class="font-medium error-text"></div>
            </div>

            {{-- Success Message --}}
            <div id="reg-success-box" class="hidden text-center py-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 text-green-500 mb-6 mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h4 class="text-2xl font-bold text-gray-800 mb-2">{{ __('land.contact_success_heading') }}</h4>
                <p class="text-gray-500">{{ __('land.reg_success_msg') }}</p>
            </div>

            {{-- ══ USER INFO CARD (pre-filled, read-only) ══ --}}
            <div class="mb-8 rounded-2xl bg-primary/5 border border-primary/12 p-5 flex items-start gap-4">
                {{-- Avatar --}}
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-extrabold text-lg shrink-0 shadow-md">
                    {{ initials($user?->name) }}
                </div>
                <div class="min-w-0">
                    <p class="font-extrabold text-gray-900 text-base truncate">{{ $user?->name }}</p>
                    <p class="text-gray-500 text-sm truncate">{{ $user?->email }}</p>
                    <span class="inline-block mt-1.5 px-2.5 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-bold">
                        {{ __('land.reg_logged_in_as') }}
                    </span>
                </div>
            </div>

            {{-- ══ FORM ══ --}}
            <form id="course-registration-form" action="{{ route('courses.register') }}" method="POST" class="space-y-5">
                @csrf
                <input type="hidden" name="course_id"  value="{{ $course->id }}">
                <input type="hidden" name="full_name"   value="{{ $user?->name }}">
                <input type="hidden" name="email"       value="{{ $user?->email }}">
                <input type="hidden" name="phone"       value="{{ $user?->phone ?? '' }}">
                <input type="hidden" name="profession"  value="{{ $user?->specialty ?? '' }}">
                <input type="hidden" name="workplace"   value="{{ $user?->workplace ?? '' }}">

                {{-- Displayed (read-only) fields ───────────────── --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    {{-- Full Name --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">
                            {{ __('land.reg_full_name') }}
                        </label>
                        <div class="flex items-center gap-2.5 px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 font-medium text-sm">
                            <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="truncate">{{ $user?->name ?? '—' }}</span>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">
                            {{ __('land.reg_email') }}
                        </label>
                        <div class="flex items-center gap-2.5 px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 font-medium text-sm" dir="ltr">
                            <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="truncate">{{ $user?->email ?? '—' }}</span>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">
                            {{ __('land.reg_phone') }}
                        </label>
                        <div class="flex items-center gap-2.5 px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 font-medium text-sm" dir="ltr">
                            <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="truncate">{{ $user?->phone ?? '—' }}</span>
                        </div>
                    </div>

                    {{-- Specialty / Profession --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">
                            {{ __('land.reg_profession') }}
                        </label>
                        <div class="flex items-center gap-2.5 px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 font-medium text-sm">
                            <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="truncate">{{ $user?->specialty ?? '—' }}</span>
                        </div>
                    </div>

                    {{-- Workplace --}}
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">
                            {{ __('land.reg_workplace') }}
                        </label>
                        <div class="flex items-center gap-2.5 px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 font-medium text-sm">
                            <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <span class="truncate">{{ $user?->workplace ?? '—' }}</span>
                        </div>
                    </div>

                </div>

                {{-- Notes — only editable field ──────────────── --}}
                <div>
                    <label for="notes" class="block text-sm font-bold text-gray-700 mb-2">
                        {{ __('land.reg_notes') }}
                        <span class="text-gray-400 font-normal text-xs ms-1">({{ __('land.reg_optional') }})</span>
                    </label>
                    <textarea id="notes" name="notes" rows="3"
                              placeholder="{{ __('land.reg_notes_ph') }}"
                              class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring focus:ring-primary/15 text-gray-800 text-sm transition-colors placeholder:text-gray-400"></textarea>
                </div>

                {{-- Submit ──────────────────────────────── --}}
                <div class="pt-4 border-t border-gray-100">
                    <button type="submit" id="reg-submit-btn"
                            class="w-full flex items-center justify-center gap-2.5 bg-primary hover:bg-primary-dark text-white font-bold py-4 px-8 rounded-xl shadow-lg shadow-primary/25 transition-all duration-300 hover:-translate-y-0.5 disabled:opacity-60 disabled:cursor-not-allowed group">
                        {{-- Checkmark icon --}}
                        <svg class="w-5 h-5 btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="btn-text">{{ __('land.reg_btn_confirm') }}</span>
                        {{-- Spinner --}}
                        <svg class="w-5 h-5 animate-spin hidden spinner-icon" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>

                    {{-- Info hint --}}
                    <p class="text-center text-xs text-gray-400 mt-3 flex items-center justify-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ __('land.reg_confirm_hint') }}
                    </p>
                </div>
            </form>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form        = document.getElementById('course-registration-form');
            const submitBtn   = document.getElementById('reg-submit-btn');
            const btnText     = submitBtn.querySelector('.btn-text');
            const btnIcon     = submitBtn.querySelector('.btn-icon');
            const spinnerIcon = submitBtn.querySelector('.spinner-icon');
            const successBox  = document.getElementById('reg-success-box');
            const errorAlert  = document.getElementById('reg-error-alert');
            const errorText   = errorAlert.querySelector('.error-text');

            if (!form) return;

            form.addEventListener('submit', async function (e) {
                e.preventDefault();

                // Reset errors
                errorAlert.classList.add('hidden');

                // Loading state
                submitBtn.disabled = true;
                btnText.textContent = '{{ __('land.contact_processing') }}';
                btnIcon.classList.add('hidden');
                spinnerIcon.classList.remove('hidden');

                try {
                    const res  = await fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        },
                    });
                    const data = await res.json();

                    if (!res.ok) {
                        const msg = data.errors
                            ? Object.values(data.errors).flat()[0]
                            : (data.message || '{{ __('land.reg_error_msg') }}');
                        errorText.textContent = msg;
                        errorAlert.classList.remove('hidden');
                    } else {
                        form.classList.add('hidden');
                        // Hide user info card
                        const userInfoCard = form.previousElementSibling;
                        if(userInfoCard) userInfoCard.classList.add('hidden');
                        
                        successBox.classList.remove('hidden');
                    }
                } catch {
                    errorText.textContent = '{{ __('land.reg_network_error') }}';
                    errorAlert.classList.remove('hidden');
                } finally {
                    submitBtn.disabled = false;
                    btnText.textContent = '{{ __('land.reg_btn_confirm') }}';
                    btnIcon.classList.remove('hidden');
                    spinnerIcon.classList.add('hidden');
                }
            });
        });
        </script>
    @endif
</div>
