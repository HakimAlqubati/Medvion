<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('land.expert_survey_title') }} | Medvion Elite</title>
    
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        function zenithSurveyHandler() {
            return {
                currentQIndex: -1,
                allQuestions: @json($allQuestions),
                groups: @json($groupedQuestions),
                mapping: @json($questionMapping),
                loading: false,
                errors: {},
                formData: {},
                files: {},

                get currentQuestion() {
                    if (this.currentQIndex < 0 || this.currentQIndex >= this.allQuestions.length) return null;
                    return this.allQuestions[this.currentQIndex];
                },

                get currentGroupIndex() {
                    const q = this.currentQuestion;
                    if(!q) return 0;
                    return this.mapping[q.id] || 0;
                },

                get currentGroupName() {
                    return this.groups[this.currentGroupIndex]?.title || '{{ __('land.expert_survey_elite_assessment') }}';
                },

                get progressInGroup() {
                    const q = this.currentQuestion;
                    if(!q) return 0;
                    const gid = this.currentGroupIndex;
                    const gQuestions = this.allQuestions.filter(qItem => this.mapping[qItem.id] === gid);
                    const qIdxInG = gQuestions.findIndex(qItem => qItem.id === q.id);
                    return Math.round(((qIdxInG + 1) / gQuestions.length) * 100);
                },

                get completionRate() {
                    if(this.currentQIndex < 0) return 0;
                    if(this.currentQIndex >= this.allQuestions.length) return 100;
                    return Math.round(((this.currentQIndex + 1) / this.allQuestions.length) * 100);
                },

                startSurvey() {
                    this.currentQIndex = 0;
                },

                jumpTo(i) {
                    this.currentQIndex = i;
                },

                next() {
                    if(this.currentQIndex >= this.allQuestions.length) return;
                    
                    const q = this.currentQuestion;
                    const val = this.formData['answers[' + q.id + ']'];

                    if(q && q.is_required && !val && !this.files[q.id]) {
                        this.errors['answers.' + q.id] = '{{ __('land.expert_survey_requirement_alert') }}';
                        return;
                    }

                    // Validate email format
                    if(q && q.type === 'email' && val) {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if(!emailRegex.test(val)) {
                            this.errors['answers.' + q.id] = '{{ __('land.expert_survey_invalid_email') }}';
                            return;
                        }
                    }

                    // Validate phone format
                    if(q && q.type === 'phone' && val) {
                        const phoneRegex = /^[\+]?[\d\s\-\(\)]{7,20}$/;
                        if(!phoneRegex.test(val)) {
                            this.errors['answers.' + q.id] = '{{ __('land.expert_survey_invalid_phone') }}';
                            return;
                        }
                    }

                    this.errors = {};

                    if(this.currentQIndex < this.allQuestions.length) {
                        this.currentQIndex++;
                    }
                },


                prev() {
                    if(this.currentQIndex > 0) {
                        this.currentQIndex--;
                    } else if(this.currentQIndex === 0) {
                        this.currentQIndex = -1;
                    }
                },

                handleChoice(q, opt) {
                    const key = 'answers[' + q.id + ']';
                    if(q.type === 'checkboxes') {
                        if(!this.formData[key]) this.formData[key] = [];
                        if(this.formData[key].includes(opt)) {
                            this.formData[key] = this.formData[key].filter(i => i !== opt);
                        } else {
                            this.formData[key].push(opt);
                        }
                    } else {
                        this.formData[key] = opt;
                        setTimeout(() => this.next(), 400);
                    }
                },

                isSelected(qid, opt) {
                    const val = this.formData['answers[' + qid + ']'];
                    if(Array.isArray(val)) return val.includes(opt);
                    return val === opt;
                },

                handleFile(e, qid) {
                    const file = e.target.files[0];
                    if(file) {
                        this.files[qid] = file;
                    }
                },

                fileName(qid) {
                    return this.files[qid]?.name || '';
                },

                async submitForm() {
                    this.loading = true;
                    this.errors = {};
                    
                    const form = document.getElementById('zenith-survey-form');
                    const fd = new FormData(form);

                    try {
                        const res = await fetch(form.action, {
                            method: 'POST',
                            body: fd,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                            }
                        });

                        const data = await res.json();

                        if (res.status === 422) {
                            this.errors = data.errors;
                            let firstErrField = Object.keys(data.errors)[0];
                            let qId = firstErrField.split('.')[1];
                            let targetIdx = this.allQuestions.findIndex(q => q.id == qId);
                            
                            if(targetIdx !== -1) {
                                this.currentQIndex = targetIdx;
                                alert('{{ __('land.expert_survey_accuracy_alert') }} ' + this.allQuestions[targetIdx].question_text);
                            }
                        } else if (res.ok) {
                            this.currentQIndex = 999;
                        }
                    } catch (e) {
                        alert('System: Connection unstable. Manual retry recommended.');
                    } finally {
                        this.loading = false;
                    }
                }
            }
        }
    </script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Tajawal', sans-serif; overflow: hidden; background-color: #01040D; }
        
        .cyber-grid {
             background-image: 
                linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);
             background-size: 80px 80px;
        }

        .zenith-btn {
            @apply relative inline-flex items-center gap-6 px-14 py-6 text-white font-black rounded-[2rem] transition-all duration-500 overflow-hidden ring-1 ring-white/10;
            background-color: #0D9488;
            box-shadow: 0 0 40px rgba(13,148,136,0.4);
            animation: neon-pulse 3s infinite;
        }

        @keyframes neon-pulse {
            0%, 100% { box-shadow: 0 0 40px rgba(13,148,136,0.3); }
            50% { box-shadow: 0 0 80px rgba(13,148,136,0.7); transform: scale(1.02); }
        }

        .zenith-btn::before {
            content: '';
            @apply absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full;
            transition: transform 0.8s ease-in-out;
        }
        .zenith-btn:hover::before { @apply translate-x-full; }

        .zenith-input {
            @apply w-full bg-transparent border-b-4 border-white/10 py-4 text-3xl sm:text-5xl font-black text-white focus:outline-none focus:border-secondary transition-all placeholder-white/5;
        }

        .zenith-choice {
            @apply flex items-center gap-6 p-8 bg-white/[0.03] border-2 border-white/5 rounded-[2rem] cursor-pointer hover:bg-secondary/10 hover:border-secondary transition-all duration-300;
        }
        .zenith-choice.selected {
            @apply bg-secondary/20 border-secondary scale-[1.03] shadow-[0_25px_50px_-15px_rgba(13,148,136,0.4)];
        }

        @keyframes gateIn {
            from { opacity: 0; transform: scale(1.1) translateY(-30px); filter: blur(20px); }
            to { opacity: 1; transform: scale(1) translateY(0); filter: blur(0); }
        }
        .animate-gate-in { animation: gateIn 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-10px); }
            40%, 80% { transform: translateX(10px); }
        }
        .animate-shake { animation: shake 0.5s ease-in-out; }

        @keyframes pulse-intense {
            0%, 100% { transform: scale(1); opacity: 0.1; }
            50% { transform: scale(1.1); opacity: 0.2; }
        }
        .animate-pulse-slow { animation: pulse-intense 8s ease-in-out infinite; }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        input[type="text"],input[type="email"],input[type="tel"], textarea{
            width: 100%;
        }
    </style>
</head>
<body class="antialiased selection:bg-secondary selection:text-white">

    <div x-data="zenithSurveyHandler()" 
         class="fixed inset-0 flex flex-col z-[9999]"
         x-cloak
         @keydown.enter.prevent="next()"
         @keydown.window.backspace="if($event.target.tagName !== 'INPUT' && $event.target.tagName !== 'TEXTAREA') prev()">
        
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-0 right-0 w-[50vw] h-[50vh] bg-primary/10 blur-[150px] rounded-full animate-pulse-slow"></div>
            <div class="absolute bottom-0 left-0 w-[40vw] h-[40vh] bg-secondary/10 blur-[120px] rounded-full animate-pulse-slow delay-1000"></div>
            <div class="absolute inset-0 opacity-[0.03] cyber-grid"></div>
        </div>

        <header class="relative z-50 flex items-center justify-between px-6 py-4 border-b border-white/5 bg-black/40 backdrop-blur-3xl h-20 shadow-2xl">
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-secondary to-primary-light flex items-center justify-center text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xs font-black uppercase tracking-[0.4em] text-white/30 leading-none mb-1">{{ __('land.expert_survey_elite_assessment') }}</h1>
                        <p class="text-sm font-bold text-secondary" x-text="currentGroupName"></p>
                    </div>
                </div>
            </div>

            <div class="hidden md:flex items-center gap-2">
                <template x-for="(g, index) in groups" :key="index">
                    <div class="h-1.5 rounded-full bg-white/5 overflow-hidden w-16 transition-all duration-300"
                         :class="index === currentGroupIndex ? 'ring-2 ring-secondary/20' : ''">
                        <div class="h-full bg-secondary shadow-[0_0_10px_#0D9488] transition-all duration-1000 ease-out"
                             :style="{ width: index < currentGroupIndex ? '100%' : (index === currentGroupIndex ? progressInGroup + '%' : '0%') }"></div>
                    </div>
                </template>
            </div>

            <div class="flex items-center gap-6">
                <div class="text-right">
                    <span class="text-xl font-black text-white block leading-none" x-text="completionRate + '%'"></span>
                    <span class="text-[10px] text-white/30 uppercase tracking-[0.2em] font-black">{{ __('land.expert_survey_sync_ratio') }}</span>
                </div>
                <button type="button" @click="if(confirm('{{ __('land.expert_survey_quit_confirm') }}')) window.location.href='/'" 
                        class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-white/40 hover:text-white hover:bg-white/10 hover:border-white/20 transition-all">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </header>

        <main class="relative z-10 flex-1 overflow-y-auto no-scrollbar">
            <form id="zenith-survey-form" 
                  action="{{ route('expert-board.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  @submit.prevent="submitForm"
                  class="min-h-full w-full flex items-center justify-center p-6 sm:p-12 sm:py-24">
                @csrf
                <input type="hidden" name="survey_id" value="{{ $survey->id }}">

                <div class="max-w-5xl w-full relative">
                    
                    <template x-if="currentQIndex === -1">
                        <div class="text-center space-y-12 animate-gate-in">
                            <div class="inline-block px-6 py-2 rounded-full border border-secondary/30 bg-secondary/5 text-secondary text-xs font-black uppercase tracking-[0.5em] mb-4">
                                Protocol Verification
                            </div>
                            <h1 class="text-6xl sm:text-8xl font-black tracking-tighter leading-none bg-clip-text text-transparent bg-gradient-to-b from-white to-white/30">
                                {{ __('land.expert_survey_hero_title') }}
                            </h1>
                            <p class="text-2xl sm:text-3xl text-white/40 leading-relaxed max-w-3xl mx-auto font-medium">
                                {{ __('land.expert_survey_hero_desc') }}
                            </p>
                            <button type="button" @click="startSurvey" class="zenith-btn group mt-8">
                                <span class="text-xl">{{ __('land.expert_survey_start_btn') }}</span>
                                <svg class="w-8 h-8 group-hover:translate-x-3 transition-transform rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" /></svg>
                            </button>
                        </div>
                    </template>

                    <template x-for="(q, idx) in allQuestions" :key="q.id">
                        <div x-show="currentQIndex === idx" 
                             class="space-y-16 w-full" 
                             x-transition:enter="transition ease-out duration-700 delay-300 transform"
                             x-transition:enter-start="opacity-0 translate-y-32 blur-xl"
                             x-transition:enter-end="opacity-100 translate-y-0 blur-0"
                             x-transition:leave="transition ease-in duration-300 transform"
                             x-transition:leave-start="opacity-100 translate-y-0 blur-0"
                             x-transition:leave-end="opacity-0 -translate-y-32 blur-xl">
                            
                            <div class="space-y-8 text-center sm:text-start">
                                <div class="flex items-center gap-8">
                                    <div class="h-1 flex-1 bg-gradient-to-r from-secondary/50 to-transparent"></div>
                                    <span class="text-base font-black text-secondary tracking-[1em] uppercase" x-text="'{{ __('land.expert_survey_phase') }} ' + (currentGroupIndex + 1)"></span>
                                    <div class="h-1 flex-1 bg-gradient-to-l from-secondary/50 to-transparent"></div>
                                </div>
                                <h2 class="text-4xl sm:text-6xl font-black text-white tracking-tight leading-tight" x-text="q.question_text"></h2>
                            </div>

                            <div class="relative pt-4">
                                <template x-if="q.type === 'email'">
                                    <input type="email"
                                           :name="'answers[' + q.id + ']'"
                                           :id="'f-' + q.id"
                                           class="zenith-input"
                                           placeholder="..."
                                           x-model="formData['answers[' + q.id + ']']"
                                           @keydown.enter.stop="next()"
                                           autofocus>
                                </template>

                                <template x-if="q.type === 'phone'">
                                    <input type="tel"
                                           :name="'answers[' + q.id + ']'"
                                           :id="'f-' + q.id"
                                           class="zenith-input"
                                           placeholder="..."
                                           x-model="formData['answers[' + q.id + ']']"
                                           @keydown.enter.stop="next()"
                                           autofocus>
                                </template>

                                <template x-if="q.type === 'short_text'">
                                    <input type="text"
                                           :name="'answers[' + q.id + ']'"
                                           :id="'f-' + q.id"
                                           class="zenith-input"
                                           placeholder="..."
                                           x-model="formData['answers[' + q.id + ']']"
                                           @keydown.enter.stop="next()"
                                           autofocus>
                                </template>

                                <template x-if="q.type === 'long_text'">
                                    <textarea :name="'answers[' + q.id + ']'" 
                                              :id="'f-' + q.id"
                                              class="zenith-input min-h-[200px] border-b-2"
                                              placeholder="..."
                                              x-model="formData['answers[' + q.id + ']']"
                                              autofocus></textarea>
                                </template>

                                <template x-if="['radio', 'select', 'checkboxes'].includes(q.type)">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <template x-for="(opt, oIdx) in q.options" :key="opt">
                                            <label class="zenith-choice group/opt" :class="isSelected(q.id, opt) ? 'selected' : ''">
                                                <input :type="q.type === 'checkboxes' ? 'checkbox' : 'radio'" 
                                                       :name="q.type === 'checkboxes' ? 'answers[' + q.id + '][]' : 'answers[' + q.id + ']'"
                                                       :value="opt"
                                                       @change="handleChoice(q, opt)"
                                                       class="hidden">
                                                <div class="w-10 h-10 rounded-2xl border flex items-center justify-center transition-all shadow-inner"
                                                     :class="isSelected(q.id, opt) ? 'bg-secondary border-secondary scale-110 shadow-[0_0_20px_#0D9488]' : 'bg-white/5 border-white/10 group-hover/opt:border-secondary/50'">
                                                    <svg x-show="isSelected(q.id, opt)" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                                    <span x-show="!isSelected(q.id, opt)" class="text-xs font-black text-white/20" x-text="String.fromCharCode(65 + oIdx)"></span>
                                                </div>
                                                <span class="text-2xl font-bold tracking-tight transition-all" :class="isSelected(q.id, opt) ? 'text-white' : 'text-white/40 group-hover/opt:text-white/70'" x-text="opt"></span>
                                            </label>
                                        </template>
                                    </div>
                                </template>

                                <template x-if="q.type === 'file'">
                                    <div class="group/file relative">
                                        <input type="file" :name="'answers[' + q.id + ']'" 
                                               :id="'f-' + q.id"
                                               class="hidden-file-input"
                                               @change="handleFile($event, q.id)">
                                        <button type="button" @click="$el.previousElementSibling.click()"
                                                class="zenith-btn bg-white/5 border border-white/10 w-full h-48 flex flex-col items-center justify-center gap-4 hover:bg-white/10 hover:border-secondary transition-all rounded-[3rem]">
                                            <div class="w-20 h-20 rounded-full bg-secondary/10 flex items-center justify-center text-secondary mb-2 group-hover/file:scale-110 transition-transform">
                                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" /></svg>
                                            </div>
                                            <span class="text-xl font-bold text-white/60 truncate max-w-full px-12" x-text="fileName(q.id) || '...'"></span>
                                        </button>
                                    </div>
                                </template>

                                <div x-show="errors['answers.' + q.id]" 
                                     class="mt-10 p-6 rounded-3xl bg-red-500/10 border border-red-500/20 text-red-500 font-bold text-lg flex items-center gap-4 animate-shake">
                                    <svg class="w-8 h-8 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>
                                    <span x-text="errors['answers.' + q.id]"></span>
                                </div>
                            </div>
                        </div>
                    </template>

                    <template x-if="currentQIndex === allQuestions.length">
                        <div class="text-center space-y-16 animate-gate-in">
                            <div class="space-y-6">
                                <h2 class="text-7xl font-black tracking-tighter leading-none">{{ __('land.expert_survey_complete_title') }}</h2>
                                <p class="text-3xl text-gray-300 max-w-2xl mx-auto font-medium leading-relaxed">
                                    {{ __('land.expert_survey_complete_desc') }}
                                </p>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center justify-center gap-8">
                                <button type="button" @click="currentQIndex = 0" class="px-14 py-6 rounded-3xl bg-white/5 font-black text-xl hover:bg-white/10 transition-all border border-white/5">{{ __('land.expert_survey_redo_btn') }}</button>
                                <button type="button" @click="submitForm" :disabled="loading" class="zenith-btn min-w-[320px]">
                                    <span x-show="!loading" class="text-xl">{{ __('land.expert_survey_submit_to_board') }}</span>
                                    <span x-show="loading" class="flex items-center gap-4"><svg class="animate-spin h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>{{ __('land.expert_survey_analyzing') }}</span>
                                </button>
                            </div>
                        </div>
                    </template>

                    <template x-if="currentQIndex === 999">
                         <div class="text-center space-y-14 animate-gate-in">
                            <div class="relative w-48 h-48 mx-auto">
                                <div class="absolute inset-0 bg-secondary/30 blur-[80px] rounded-full animate-pulse"></div>
                                <div class="relative w-full h-full bg-secondary rounded-full flex items-center justify-center text-white shadow-[0_0_100px_rgba(13,148,136,0.7)] transform rotate-[360deg] transition-all">
                                    <svg class="w-24 h-24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                </div>
                            </div>
                            <h2 class="text-7xl font-black tracking-tighter text-white drop-shadow-2xl">{{ __('land.expert_survey_success_title') }}</h2>
                            <p class="text-3xl text-gray-200 leading-relaxed max-w-2xl mx-auto font-bold">{{ __('land.expert_survey_success_body') }}</p>
                            <a href="{{ route('home') }}" class="inline-block zenith-btn">
                                {{ __('land.expert_survey_confirm_exit') }}
                            </a>
                         </div>
                    </template>
                </div>
            </form>
        </main>

        <footer class="h-28 bg-black/40 backdrop-blur-3xl border-t border-white/5 px-12 flex items-center justify-between z-50">
            <div class="min-w-[150px]">
                <button type="button" @click="prev" x-show="currentQIndex >= 0 && currentQIndex < allQuestions.length" 
                        class="flex items-center gap-4 text-white/30 hover:text-white transition-all font-black text-xl group">
                    <svg class="w-8 h-8 rtl:rotate-180 group-hover:-translate-x-3 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    {{ __('land.expert_survey_prev_btn') }}
                </button>
            </div>
            
            <div x-show="currentQIndex >= 0 && currentQIndex < allQuestions.length" class="flex-1 flex justify-center items-center gap-3 no-scrollbar overflow-x-auto px-10">
                <template x-for="(q, i) in allQuestions" :key="q.id">
                    <button type="button" @click="jumpTo(i)"
                            class="w-2 h-2 rounded-full transition-all duration-500"
                            :class="i === currentQIndex ? 'bg-secondary w-6 shadow-[0_0_10px_#0D9488]' : (i < currentQIndex ? 'bg-secondary/40' : 'bg-white/10')"></button>
                </template>
            </div>

            <div class="min-w-[150px] flex justify-end">
                <button type="button" @click="next" x-show="currentQIndex >= 0 && currentQIndex < allQuestions.length" 
                        class="flex items-center gap-4 text-secondary hover:text-white transition-all font-black text-2xl group">
                    {{ __('land.expert_survey_next_btn') }}
                    <svg class="w-8 h-8 rtl:rotate-180 group-hover:translate-x-3 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-3.75 3.75M21 12H3" /></svg>
                </button>
            </div>
        </footer>
    </div>
</body>
</html>
