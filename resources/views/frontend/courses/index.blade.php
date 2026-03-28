<x-layouts.frontend :title="__('land.courses_heading')">

    {{-- Minimal Hero for Internal Pages --}}
    <section class="relative pt-44 pb-20 lg:pt-52 lg:pb-28 bg-primary overflow-hidden isolate">
        <div class="absolute inset-0 z-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&q=80')] bg-cover bg-center mix-blend-overlay"></div>
        <div class="absolute inset-0 z-0 bg-gradient-to-b from-primary-dark/80 to-primary/95 pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center reveal">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                {{ __('land.courses_heading') }}
            </h1>
            <p class="text-lg md:text-xl text-white/80 max-w-2xl mx-auto">
                استكشف مجموعة متنوعة من الدورات المتخصصة في مجالات الرعاية الصحية والتأهيل الطبي.
            </p>
        </div>
    </section>

    {{-- Courses Grid --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 reveal delay-100">
                {{-- Dummy Courses Loop for Theme --}}
                @php
                    $dummyCourses = [
                        [
                            'title' => __('land.course_1_title'),
                            'cat' => __('land.course_1_category'),
                            'level' => 'advanced',
                            'color' => 'primary',
                            'slug' => 'emergency-medicine-essentials',
                            'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&q=80',
                            'price' => 150
                        ],
                        [
                            'title' => __('land.course_2_title'),
                            'cat' => __('land.course_2_category'),
                            'level' => 'inter',
                            'color' => 'secondary',
                            'slug' => 'medical-radiology-techniques',
                            'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&q=80',
                            'price' => 0
                        ],
                        [
                            'title' => __('land.course_3_title'),
                            'cat' => __('land.course_3_category'),
                            'level' => 'beginner',
                            'color' => 'primary',
                            'slug' => 'surgical-assistant-training',
                            'image' => 'https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&q=80',
                            'price' => 299
                        ],
                        [
                            'title' => 'مكافحة العدوى في المنشآت الصحية',
                            'cat' => 'الصحة العامة',
                            'level' => 'inter',
                            'color' => 'secondary',
                            'slug' => 'infection-control-basics',
                            'image' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&q=80',
                            'price' => 80
                        ],
                        [
                            'title' => 'إدارة الجودة الشاملة في الرعاية الصحية',
                            'cat' => 'الإدارة الصحية',
                            'level' => 'advanced',
                            'color' => 'primary',
                            'slug' => 'healthcare-quality-management',
                            'image' => 'https://images.unsplash.com/photo-1454165833467-1359a33a7f74?auto=format&fit=crop&q=80',
                            'price' => 450
                        ],
                        [
                            'title' => 'أساسيات الإسعافات الأولية المتقدمة',
                            'cat' => 'الطوارئ والإنقاذ',
                            'level' => 'beginner',
                            'color' => 'secondary',
                            'slug' => 'advanced-first-aid-basics',
                            'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&q=80',
                            'price' => 0
                        ],
                    ];
                @endphp

                @foreach($dummyCourses as $course)
                    <x-frontend.course-card
                        :title="$course['title']"
                        :category="$course['cat']"
                        :level="$course['level']"
                        :hours="rand(8, 30)"
                        :students="rand(50, 500)"
                        :color="$course['color']"
                        :slug="$course['slug']"
                        :image="$course['image']"
                        :price="$course['price']"
                    />
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.frontend>
