<x-layouts.frontend>
    <x-slot:title>
        {{ __('land.expert_survey_title') }}
    </x-slot:title>

    {{-- =========================================================
         EXPERT ASSESSMENT PAGE - CINEMATIC BLADE VERSION
         ========================================================= --}}
    <div class="relative min-h-screen bg-primary-deep text-white overflow-hidden flex flex-col justify-center pt-28 pb-20">
        
        {{-- AMBIENT BACKGROUND --}}
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden" aria-hidden="true">
            <div class="absolute inset-0"
                 style="background: radial-gradient(circle at 30% 20%, rgba(26,82,206,0.15) 0%, transparent 60%);"></div>
            <div class="absolute inset-0"
                 style="background: radial-gradient(circle at 80% 80%, rgba(13,148,136,0.15) 0%, transparent 60%);"></div>
            
            {{-- Matrix Grid --}}
            <div class="absolute inset-0 opacity-[0.02]"
                 style="background-image: linear-gradient(rgba(255,255,255,1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,1) 1px, transparent 1px); background-size: 50px 50px;"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            
            {{-- INTRO HERO --}}
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full border border-white/10 bg-white/5 backdrop-blur-md mb-8 shadow-lg">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-secondary"></span>
                    </span>
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-white">
                        {{ __('land.expert_survey_hero_badge') }}
                    </span>
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 tracking-tight leading-tight">
                    {{ __('land.expert_survey_hero_title') }}
                </h1>
                
                <p class="text-xl text-white/70 max-w-2xl mx-auto leading-relaxed">
                    {{ __('land.expert_survey_hero_desc') }}
                </p>
            </div>

            {{-- THE FORM --}}
            <div id="form-container" class="relative reveal delay-100">
                <div class="bg-white/[0.03] backdrop-blur-2xl border border-white/10 rounded-[3rem] p-8 md:p-12 shadow-2xl relative overflow-hidden">
                    
                    {{-- Form Overlay for Success --}}
                    <div id="success-message" style="display: none;" class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-primary-deep/95 backdrop-blur-3xl text-center px-8 animate-fade-in">
                        <div class="w-24 h-24 bg-secondary/20 text-secondary rounded-full flex items-center justify-center mb-8 shadow-[0_0_40px_rgba(13,148,136,0.3)]">
                            <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-black mb-4">{{ __('land.expert_survey_success_title') }}</h2>
                        <p class="text-white/60 text-lg mb-8 max-w-sm">{{ __('land.expert_survey_success_body') }}</p>
                        <a href="{{ route('home') }}" class="px-8 py-3 bg-white text-primary font-bold rounded-full hover:bg-gray-100 transition-all">
                            {{ __('land.expert_survey_back_home') }}
                        </a>
                    </div>

                    <form id="expert-survey-form" action="{{ route('expert-board.store') }}" method="POST" enctype="multipart/form-data" class="space-y-12">
                        @csrf
                        <input type="hidden" name="survey_id" value="{{ $survey->id }}">

                        {{-- Loop through questions with section detection or grouping --}}
                        @php $currentSection = ''; @endphp
                        @foreach($survey->questions as $index => $question)
                            
                            {{-- Optional: Manually define sections based on question keys or indices for better UI --}}
                            @if($index === 0) 
                                <div class="pb-4 border-b border-white/5 mb-8">
                                    <h3 class="text-xl font-bold text-secondary flex items-center gap-3">
                                        <span class="w-8 h-8 rounded-lg bg-secondary/10 flex items-center justify-center text-sm">01</span>
                                        البيانات الأساسية والأكاديمية
                                    </h3>
                                </div>
                            @elseif($index === 11)
                                <div class="pt-12 pb-4 border-b border-white/5 mb-8">
                                    <h3 class="text-xl font-bold text-secondary flex items-center gap-3">
                                        <span class="w-8 h-8 rounded-lg bg-secondary/10 flex items-center justify-center text-sm">02</span>
                                        الخبرة العملية والقدرات التعليمية
                                    </h3>
                                </div>
                            @elseif($index === 20)
                                <div class="pt-12 pb-4 border-b border-white/5 mb-8">
                                    <h3 class="text-xl font-bold text-secondary flex items-center gap-3">
                                        <span class="w-8 h-8 rounded-lg bg-secondary/10 flex items-center justify-center text-sm">03</span>
                                        المحتوى التدريبي والملفات
                                    </h3>
                                </div>
                            @endif

                            <div class="space-y-4 reveal delay-{{ ($index % 5) * 100 }}">
                                <label class="block text-lg font-bold text-white/90">
                                    {{ $question->question_text }}
                                    @if($question->is_required) <span class="text-secondary ml-1">*</span> @endif
                                </label>

                                @php $qid = "answers[{$question->id}]"; @endphp

                                @if(in_array($question->type, ['short_text', 'email', 'phone']))
                                    <input type="{{ $question->type === 'email' ? 'email' : ($question->type === 'phone' ? 'tel' : 'text') }}"
                                           name="{{ $qid }}" id="q-{{ $question->id }}"
                                           {{ $question->is_required ? 'required' : '' }}
                                           class="cyber-input w-full bg-white/[0.05] border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-secondary transition-all placeholder-white/20">
                                
                                @elseif($question->type === 'long_text')
                                    <textarea name="{{ $qid }}" id="q-{{ $question->id }}" rows="3"
                                              {{ $question->is_required ? 'required' : '' }}
                                              class="cyber-input w-full bg-white/[0.05] border border-white/10 rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-secondary transition-all placeholder-white/20"></textarea>
                                
                                @elseif(in_array($question->type, ['radio', 'select', 'checkboxes']))
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        @foreach($question->options ?? [] as $optIndex => $option)
                                            <label class="group relative flex items-center gap-4 p-4 rounded-2xl border border-white/10 bg-white/[0.02] cursor-pointer hover:bg-white/[0.08] hover:border-secondary/50 transition-all active:scale-[0.98]">
                                                <input type="{{ $question->type === 'checkboxes' ? 'checkbox' : 'radio' }}" 
                                                       name="{{ $question->type === 'checkboxes' ? $qid.'[]' : $qid }}" 
                                                       value="{{ $option }}"
                                                       class="w-5 h-5 text-secondary border-white/20 bg-transparent focus:ring-secondary rounded-full">
                                                <span class="text-white/80 font-medium group-hover:text-white transition-colors">{{ $option }}</span>
                                            </label>
                                        @endforeach
                                    </div>

                                @elseif($question->type === 'file')
                                    <div class="relative group">
                                        <input type="file" name="{{ $qid }}" id="q-{{ $question->id }}"
                                               {{ $question->is_required ? 'required' : '' }}
                                               class="hidden file-input-real">
                                        <button type="button" onclick="this.previousElementSibling.click()"
                                                class="w-full flex items-center justify-between px-6 py-4 bg-white/[0.05] border-2 border-dashed border-white/10 rounded-2xl hover:border-secondary transition-all group-hover:bg-white/[0.08]">
                                            <span class="text-white/40 file-name-display">{{ __('land.hero_badge') }}</span>
                                            <svg class="w-6 h-6 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                                <div class="error-container" data-field="answers.{{ $question->id }}"></div>
                            </div>
                        @endforeach

                        {{-- SUBMIT --}}
                        <div class="pt-8">
                            <button type="submit" id="submit-btn"
                                    class="w-full py-5 bg-gradient-to-r from-secondary to-teal-600 text-white font-black text-xl rounded-2xl shadow-xl hover:shadow-secondary/20 hover:-translate-y-1 transition-all group">
                                <span class="flex items-center justify-center gap-3">
                                    <span id="submit-text">{{ __('land.expert_survey_submit_btn') }}</span>
                                    <svg class="w-6 h-6 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .primary-deep { background-color: #03091A; }
        .cyber-input { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .cyber-input:focus { box-shadow: 0 0 20px rgba(13,148,136,0.15); }
        
        .animate-fade-in { animation: fadeIn 0.8s ease-out forwards; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Specific styles for medical theme */
        .text-secondary { color: #0D9488; }
        .bg-secondary { background-color: #0D9488; }
        .border-secondary { border-color: #0D9488; }
    </style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('expert-survey-form');
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const successMsg = document.getElementById('success-message');

            // Handle file name display
            document.querySelectorAll('.file-input-real').forEach(input => {
                input.addEventListener('change', function() {
                    const fileName = this.files[0] ? this.files[0].name : '{{ __('land.hero_badge') }}';
                    this.nextElementSibling.querySelector('.file-name-display').innerText = fileName;
                    this.nextElementSibling.querySelector('.file-name-display').classList.replace('text-white/40', 'text-white');
                });
            });

            if(form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    
                    // Clear previous errors
                    document.querySelectorAll('.error-msg').forEach(el => el.remove());
                    
                    submitBtn.disabled = true;
                    const originalText = submitText.innerText;
                    submitText.innerText = "{{ __('land.contact_processing') }}";
                    
                    const formData = new FormData(form);
                    
                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                        }
                    })
                    .then(res => res.json().then(data => ({status: res.status, body: data})))
                    .then(response => {
                        if(response.status === 422) {
                            const errors = response.body.errors;
                            for (const field in errors) {
                                // field usually is "answers.ID"
                                const container = document.querySelector(`[data-field="${field}"]`);
                                if(container) {
                                    container.innerHTML = `<p class="error-msg text-red-400 text-xs font-bold mt-2 animate-fade-in">${errors[field][0]}</p>`;
                                    // Highlight the input/label
                                    const parent = container.parentElement;
                                    parent.querySelector('input, textarea, div')?.classList.add('border-red-500/50');
                                }
                            }
                            // Scroll to first error
                            const firstError = document.querySelector('.error-msg');
                            if(firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        } else if(response.status === 200 || response.status === 201) {
                            successMsg.style.display = 'flex';
                            window.scrollTo({ top: successMsg.offsetTop - 100, behavior: 'smooth' });
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('حدث خطأ في الاتصال، يرجى المحاولة مرة أخرى.');
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        if(successMsg.style.display === 'none') {
                            submitText.innerText = originalText;
                        }
                    });
                });
            }
        });
    </script>
    @endpush
</x-layouts.frontend>
