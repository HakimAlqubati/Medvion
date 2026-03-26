<x-layouts.frontend title="تفاصيل الدورة">

    {{-- Course Header --}}
    <section class="relative pt-44 pb-16 lg:pt-52 lg:pb-24 bg-primary overflow-hidden isolate">
        <div class="absolute inset-0 z-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&q=80')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="absolute inset-0 z-0 bg-gradient-to-r from-primary-dark/90 to-primary/80 pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 reveal">
            <div class="max-w-3xl">
                <span class="inline-block px-3 py-1 bg-white/10 text-white text-sm font-bold rounded-full mb-6 relative z-20 shadow-sm border border-white/10">
                    {{ __('land.course_1_category') }}
                </span>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white mb-6 leading-snug">
                    {{ str_replace('-', ' ', urldecode($slug)) }}
                </h1>
                <p class="text-lg text-white/80 leading-relaxed mb-8">
                    هذه الدورة مصممة خصيصاً لتزويد الكوادر الصحية بأحدث المعارف والمهارات اللازمة للتعامل مع هذا التخصص بدقة واحترافية عالية، بناءً على المعايير العالمية المعتمدة.
                </p>
                
                <div class="flex flex-wrap items-center gap-6 text-sm text-white/90">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>20 ساعة تدريبية</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                        <span>اللغة العربية</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="text-green-400 font-bold">شهادة معتمدة</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Course Content --}}
    <section class="py-16 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                {{-- Main Details --}}
                <div class="lg:col-span-2 space-y-12">
                    
                    {{-- About Course --}}
                    <div class="reveal delay-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 border-r-4 border-primary pr-4">نظرة عامة على الدورة</h3>
                        <div class="prose prose-lg text-gray-600 leading-relaxed max-w-none">
                            <p>صُممت هذه الدورة لتلبية احتياجات الممارسين الصحيين الساعين لتطوير مهاراتهم الميدانية والسريرية. ستتعلم من خلال المنهج التطبيقي كيفية التعامل مع الحالات المعقدة بناءً على البروتوكولات المعتمدة عالمياً.</p>
                            <p>يتميز البرنامج بكونه يمزج بين المعرفة النظرية والتطبيق العملي لضمان أقصى استفادة ممكنة للمتدرب وتأهيله لسوق العمل والمستجدات الطبية المستمرة.</p>
                        </div>
                    </div>

                    {{-- What you will learn --}}
                    <div class="reveal delay-200">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 border-r-4 border-primary pr-4">ماذا ستتعلم؟</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach([
                                'فهم المبادئ الأساسية للتخصص والتشخيص السليم',
                                'تطبيق البروتوكولات العلاجية الحديثة والأدلة الإرشادية',
                                'إدارة الأزمات والحالات المعقدة باحترافية وسرعة',
                                'التعامل مع التكنولوجيا والمعدات الطبية بكفاءة عالية',
                                'التواصل الفعال مع المرضى وفريق الرعاية الصحية',
                                'معايير الجودة ومكافحة العدوى الشاملة'
                            ] as $point)
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100 hover:border-primary/20 transition-colors">
                                <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <span class="text-gray-700 font-medium">{{ $point }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Sidebar Sticky Registration --}}
                <div class="lg:col-span-1 reveal delay-300">
                    <div class="sticky top-32 bg-white rounded-2xl border border-gray-100 shadow-xl overflow-hidden">
                        {{-- Video / Image Placeholder --}}
                        <div class="aspect-video bg-gray-100 relative group cursor-pointer flex items-center justify-center overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1576091160550-2173ff9e5fe8?auto=format&fit=crop&q=80" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-105 transition duration-700" alt="Intro Video">
                            <div class="absolute inset-0 bg-primary/20 group-hover:bg-primary/10 transition duration-500"></div>
                            
                            <div class="relative z-10 w-16 h-16 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-primary shadow-lg group-hover:scale-110 group-hover:bg-white transition duration-500">
                                <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"/></svg>
                            </div>
                        </div>

                        <div class="p-6 md:p-8">
                            <div class="flex items-end gap-2 mb-6">
                                <span class="text-4xl font-black text-primary">مجاناً</span>
                                <span class="text-gray-400 line-through mb-1">500 ر.س</span>
                            </div>

                            <a href="#" class="flex items-center justify-center w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/30 hover:-translate-y-1 transition-all duration-300 mb-4 text-lg">
                                سجل الآن في الدورة
                            </a>
                            <p class="text-sm text-center text-gray-500 mb-6">احصل على وصول فوري ومباشر بمجرد التسجيل</p>

                            <div class="space-y-4 border-t border-gray-100 pt-6">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500 flex items-center gap-2"><svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg> مستوى الدورة</span>
                                    <span class="font-bold text-gray-900 bg-gray-100 px-2 py-0.5 rounded">متقدم</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500 flex items-center gap-2"><svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg> عدد المسجلين</span>
                                    <span class="font-bold text-gray-900">1,245 متدرب</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500 flex items-center gap-2"><svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> الشهادة</span>
                                    <span class="font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded">معتمدة دولياً</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layouts.frontend>
